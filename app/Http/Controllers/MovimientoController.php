<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use App\Models\Movimiento;
use App\Models\MovimientoDetalle;
use App\Models\Obra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Reconocer tipo de movimiento por texto
        $tipoBuscado = null;

        if ($search !== null) {
            $s = strtolower($search);

            if (in_array($s, ['entrada', 'salida', 'transferencia'])) {
                $tipoBuscado = $s;
            }
        }

        $movimientos = Movimiento::with(['origen', 'destino'])
            ->where(function ($query) use ($search, $tipoBuscado) {

                // --- Buscar por tipo ---
                if (!is_null($tipoBuscado)) {
                    $query->where('tipo', $tipoBuscado);
                }

                // --- Campos propios de movimiento ---
                $query->orWhere('fecha', 'LIKE', "%{$search}%")
                        ->orWhere('observacion', 'LIKE', "%{$search}%");

                // --- Buscar por texto en tipo de origen/destino (no muy útil, pero lo dejé) ---
                $query->orWhere('origen_tipo', 'LIKE', "%{$search}%")
                    ->orWhere('destino_tipo', 'LIKE', "%{$search}%");
                    
                // --- ORIGEN: si es proveedor ---
                $query->orWhereHasMorph(
                    'origen',
                    Proveedor::class,
                    function ($m) use ($search) {
                        $m->where('nombre', 'LIKE', "%{$search}%")
                            ->orWhere('telefono', 'LIKE', "%{$search}%")
                            ->orWhere('cuit', 'LIKE', "%{$search}%");
                    }
                );
                // --- ORIGEN: si es VEHÍCULO ---
                $query->orWhereHasMorph(
                    'origen',
                    Vehiculo::class,
                    function ($m) use ($search) {
                        $m->where('patente', 'LIKE', "%{$search}%")
                            ->orWhere('modelo', 'LIKE', "%{$search}%")
                            ->orWhere('motor', 'LIKE', "%{$search}%");
                    }
                );

                // --- DESTINO: si es VEHÍCULO ---
                $query->orWhereHasMorph(
                    'destino',
                    Vehiculo::class,
                    function ($m) use ($search) {
                        $m->where('patente', 'LIKE', "%{$search}%")
                            ->orWhere('modelo', 'LIKE', "%{$search}%")
                            ->orWhere('motor', 'LIKE', "%{$search}%");
                    }
                );

                // --- ORIGEN: buscar por nombre si es Obra o Depósito ---
                $query->orWhereHasMorph(
                    'origen',
                    [Deposito::class, Obra::class],
                    function ($m) use ($search) {
                        $m->where('nombre', 'LIKE', "%{$search}%");
                    }
                );

                // --- DESTINO: igual que origen ---
                $query->orWhereHasMorph(
                    'destino',
                    [Deposito::class, Obra::class],
                    function ($m) use ($search) {
                        $m->where('nombre', 'LIKE', "%{$search}%");
                    }
                );

            })
            ->orderBy('fecha', 'desc')
            ->paginate(10);

        return view('admin.movimientos.index', compact('movimientos'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $depositos = Deposito::all();
        $vehiculos = Vehiculo::all();
        $obras = Obra::all();
        return view('admin.movimientos.create', compact('productos','depositos','vehiculos','obras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        // 1) Filtrar productos seleccionados (sólo los que tienen cantidad > 0)
        $productosFiltrados = collect($request->input('productos', []))
            ->filter(fn($p) => isset($p['cantidad']) && $p['cantidad'] !== '' && floatval($p['cantidad']) > 0)
            ->values()
            ->all();

        // Reemplazo el arreglo en el request para validar y procesar luego
        $request->merge(['productos' => $productosFiltrados]);

        // 2) Validación
        $request->validate([
            'tipo' => 'required|in:consumo,transferencia',
            'origen_tipo' => 'required|string',
            'origen_id' => 'required|integer',
            'fecha' => 'required|date',
            'productos' => 'required|array|min:1',
            'productos.*.id' => 'required|integer|exists:productos,id',
            'productos.*.cantidad' => 'required|numeric|min:0.0001',
            // destino solo si transferencia
            'destino_tipo' => 'required_if:tipo,transferencia',
            'destino_id'   => 'required_if:tipo,transferencia',
        ]);

        DB::beginTransaction();

        try {
            // 3) Crear movimiento
            $movimiento = Movimiento::create([
                'tipo'          => $request->tipo,
                'origen_tipo'   => $request->origen_tipo,
                'origen_id'     => $request->origen_id,
                'destino_tipo'  => $request->tipo === 'transferencia' ? $request->destino_tipo : null,
                'destino_id'    => $request->tipo === 'transferencia' ? $request->destino_id : null,
                'fecha'         => $request->fecha,
                'observacion'   => $request->observacion,
            ]);

            // 4) Procesar cada producto (ya todos tienen 'cantidad')
            foreach ($request->productos as $item) {

                $productoId = intval($item['id']);
                $cantidadMovida = floatval($item['cantidad']);

                if ($cantidadMovida <= 0) {
                    continue;
                }

                // obtener meta info de origen
                $origenInfo = modeloDestino($request->origen_tipo);
                if (!$origenInfo) {
                    throw new \Exception("Tipo de origen no válido: {$request->origen_tipo}");
                }

                $origenModel = ($origenInfo['model'])::find($request->origen_id);
                if (!$origenModel) {
                    throw new \Exception("Origen no encontrado");
                }

                // Buscar pivot origen
                $pivotOrigen = $origenModel->productos()->where('producto_id', $productoId)->first();
                if (!$pivotOrigen) {
                    throw new \Exception("El producto no existe en el origen");
                }

                // ***********************************
                // 🔻 4.a) RESTAR DEL STOCK DEL ORIGEN
                // ***********************************
                $nuevoStock = floatval($pivotOrigen->pivot->stock) - $cantidadMovida;

                if ($nuevoStock < 0) {
                    throw new \Exception("Stock insuficiente en el origen");
                }

                if ($nuevoStock <= 0) {
                    // eliminar fila completa si el stock llega a 0
                    $origenModel->productos()->detach($productoId);
                } else {
                    $pivotOrigen->pivot->stock = $nuevoStock;
                    $pivotOrigen->pivot->save();
                }

                // ***********************************
                // 🔻 4.b) SI ES TRANSFERENCIA → CREAR FILA NUEVA EN DESTINO
                // ***********************************
                if ($request->tipo === 'transferencia') {

                    $destinoInfo = modeloDestino($request->destino_tipo);
                    if (!$destinoInfo) {
                        throw new \Exception("Tipo de destino no válido");
                    }

                    $destinoModel = ($destinoInfo['model'])::find($request->destino_id);
                    if (!$destinoModel) {
                        throw new \Exception("Destino no encontrado");
                    }

                    // mantener mismo detalle_compra_id del origen
                    $detalleCompraId = $pivotOrigen->pivot->detalle_compra_id ?? null;

                    // SIEMPRE crear nueva fila de pivot
                    $destinoModel->productos()->attach($productoId, [
                        'cantidad_asignada' => $cantidadMovida,  // historial
                        'stock' => $cantidadMovida,              // disponible inicial
                        'detalle_compra_id' => $detalleCompraId,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }

                // ***********************************
                // 🔻 5) Registrar detalle del movimiento
                // ***********************************
                MovimientoDetalle::create([
                    'movimiento_id' => $movimiento->id,
                    'producto_id'   => $productoId,
                    'cantidad'      => $cantidadMovida,
                ]);
            }


            DB::commit();

            return redirect()->route('movimientos.index')
                ->with('mensaje', 'Movimiento registrado exitosamente.')
                ->with('icono', 'success');
        } catch (\Throwable $e) {
            DB::rollBack();
            // para debug en desarrollo: throw $e;
            return back()->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movimiento = Movimiento::with(['detalles.producto', 'origen', 'destino'])->find($id);

        return view('admin.movimientos.show', compact('movimiento'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimiento $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimiento $movimiento)
    {
        //
    }
}
