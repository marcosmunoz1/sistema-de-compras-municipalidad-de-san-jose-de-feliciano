<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Deposito;
use App\Models\Equipo;
use App\Models\Movimiento;
use App\Models\MovimientoDetalle;
use App\Models\Obra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        // Reconocer tipo de movimiento por texto
        $tipoBuscado = null;

        if ($search !== '') {
            $s = strtolower($search);

            if (in_array($s, ['entrada', 'salida', 'transferencia'])) {
                $tipoBuscado = $s;
            }
        }

        // 🧠 Detectar si el search es una fecha DD/MM/YYYY
        $fechaFormateada = null;

        if ($search !== '' && preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $search)) {
            try {
                $fechaFormateada = \Carbon\Carbon::createFromFormat('d/m/Y', $search)
                    ->format('Y-m-d');
            } catch (\Exception $e) {
                $fechaFormateada = null;
            }
        }

        $movimientos = Movimiento::with(['origen', 'destino']);

        // --- Filtro por tipo (AND real) ---
        if ($tipoBuscado !== null) {
            $movimientos->where('tipo', $tipoBuscado);
        }

        // --- Búsqueda textual agrupada ---
        if ($search !== '') {
            $movimientos->where(function ($query) use ($search, $fechaFormateada) {

                // Campos propios del movimiento
                if ($fechaFormateada) {
                    $query->whereDate('fecha', $fechaFormateada);
                } else {
                    $query->where('fecha', 'LIKE', "%{$search}%");
                }

                $query->orWhere('observacion', 'LIKE', "%{$search}%")
                    ->orWhere('tipo', 'LIKE', "%{$search}%")
                    ->orWhere('origen_tipo', 'LIKE', "%{$search}%")
                    ->orWhere('destino_tipo', 'LIKE', "%{$search}%");

                // ORIGEN: proveedor
                $query->orWhereHasMorph(
                    'origen',
                    Proveedor::class,
                    function ($m) use ($search) {
                        $m->where('nombre', 'LIKE', "%{$search}%")
                        ->orWhere('telefono', 'LIKE', "%{$search}%")
                        ->orWhere('cuit', 'LIKE', "%{$search}%");
                    }
                );

                // ORIGEN: vehículo
                $query->orWhereHasMorph(
                    'origen',
                    Vehiculo::class,
                    function ($m) use ($search) {
                        $m->where('patente', 'LIKE', "%{$search}%")
                        ->orWhere('modelo', 'LIKE', "%{$search}%")
                        ->orWhere('marca', 'LIKE', "%{$search}%")
                        ->orWhere('motor', 'LIKE', "%{$search}%");
                    }
                );

                
                // ORIGEN: depósito u obra
                $query->orWhereHasMorph(
                    'origen',
                    [Deposito::class, Obra::class],
                    function ($m) use ($search) {
                        $m->where('nombre', 'LIKE', "%{$search}%");
                    }
                );
                
                //Origen: equipo
                $query->orWhereHasMorph(
                    'origen',
                    [Equipo::class],
                    function ($m) use ($search) {
                        $m->where('equipamiento', 'LIKE', "%{$search}%");
                    }
                );
                
                // DESTINO: vehículo
                $query->orWhereHasMorph(
                    'destino',
                    Vehiculo::class,
                    function ($m) use ($search) {
                        $m->where('patente', 'LIKE', "%{$search}%")
                        ->orWhere('modelo', 'LIKE', "%{$search}%")
                        ->orWhere('marca', 'LIKE', "%{$search}%")
                        ->orWhere('motor', 'LIKE', "%{$search}%");
                    }
                );

                // DESTINO: depósito u obra
                $query->orWhereHasMorph(
                    'destino',
                    [Deposito::class, Obra::class],
                    function ($m) use ($search) {
                        $m->where('nombre', 'LIKE', "%{$search}%");
                    }
                );

                //Destino: equipo
                $query->orWhereHasMorph(
                    'destino',
                    [Equipo::class],
                    function ($m) use ($search) {
                        $m->where('equipamiento', 'LIKE', "%{$search}%")
                            ->orWhere('marca', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->orWhere('catalogacion', 'LIKE', "%{$search}%");
                    }
                );
            });
        }

        $movimientos = $movimientos
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

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
        // 1) Filtrar productos seleccionados (sólo los que tienen cantidad > 0)
        $productosFiltrados = collect($request->input('productos', []))
            ->filter(fn($p) => isset($p['cantidad']) && $p['cantidad'] !== '' && floatval($p['cantidad']) > 0)
            ->values()
            ->all();

        // Reemplazo el arreglo en el request para validar y procesar luego
        $request->merge(['productos' => $productosFiltrados]);

        // 2) Validación ✅ CORREGIDA
        $request->validate([
            'tipo' => 'required|in:consumo,transferencia',
            'origen_tipo' => 'required|string',
            'origen_id' => 'required|integer',
            'fecha' => 'required|date',
            'productos' => 'required|array|min:1',
            'productos.*.pivot_id' => 'nullable|integer', // ✅ Agregado
            'productos.*.producto_id' => 'required|integer|exists:productos,id', // ✅ Cambiado de 'id' a 'producto_id'
            'productos.*.cantidad' => 'required|numeric|min:0.0001',
            // destino solo si transferencia
            'destino_tipo' => 'required_if:tipo,transferencia',
            'destino_id'   => 'required_if:tipo,transferencia',
            'observacion' => 'required', 
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

            // 4) Procesar cada producto
            foreach ($request->productos as $item) {
                $pivotId = $item['pivot_id'] ?? null;
                $productoId = intval($item['producto_id']); // ✅ Cambiado de 'id' a 'producto_id'
                $cantidadMovida = floatval($item['cantidad']);

                if ($cantidadMovida <= 0) {
                    continue;
                }

                // ✅ Validar que el pivot_id esté presente
                if (!$pivotId) {
                    throw new \Exception("Falta el identificador del registro pivot");
                }

                // Obtener origen
                $origenInfo = modeloDestino($request->origen_tipo);
                if (!$origenInfo) {
                    throw new \Exception("Tipo de origen no válido: {$request->origen_tipo}");
                }

                $origenModel = ($origenInfo['model'])::find($request->origen_id);
                if (!$origenModel) {
                    throw new \Exception("Origen no encontrado");
                }

                // ✅ Buscar el pivot específico por su ID
                $pivotOrigen = $origenModel->productos()
                    ->wherePivot('id', $pivotId)
                    ->where('producto_id', $productoId)
                    ->first();

                if (!$pivotOrigen) {
                    throw new \Exception("El registro específico del producto no existe en el origen");
                }

                $cantidadAsignadaActual = floatval($pivotOrigen->pivot->cantidad_asignada);
                $stockActual = floatval($pivotOrigen->pivot->stock);
                $detalleCompraId = $pivotOrigen->pivot->detalle_compra_id;

                // Validar que no se mueva más de lo asignado
                if ($cantidadMovida > $cantidadAsignadaActual) {
                    throw new \Exception("No puedes transferir más de lo asignado originalmente para el producto: {$pivotOrigen->nombre}");
                }

                // 🔥 LÓGICA DIFERENTE SEGÚN EL TIPO
                if ($request->tipo === 'consumo') {
                    // ✅ CONSUMO: Solo restar del stock, mantener cantidad_asignada
                    if ($cantidadMovida > $stockActual) {
                        throw new \Exception("No hay suficiente stock disponible para consumir del producto: {$pivotOrigen->nombre}");
                    }
                    
                    $nuevoStock = $stockActual - $cantidadMovida;
                    
                    // Actualizar solo el stock
                    DB::table($origenInfo['table'])
                        ->where('id', $pivotId)
                        ->update([
                            'stock' => max(0, $nuevoStock),
                            'updated_at' => now()
                        ]);
                        
                } else {
                    // ✅ TRANSFERENCIA: Validar stock disponible
                    if ($cantidadMovida > $stockActual) {
                        throw new \Exception("No hay suficiente stock disponible para transferir del producto: {$pivotOrigen->nombre}");
                    }
                    // ✅ TRANSFERENCIA: Restar de cantidad_asignada Y stock
                    $nuevaCantidadAsignada = $cantidadAsignadaActual - $cantidadMovida;
                    
                    // Calcular cuánto stock mover (proporcionalmente)
                    $proporcionStock = $cantidadAsignadaActual > 0 
                        ? ($stockActual / $cantidadAsignadaActual) 
                        : 1;
                    $stockAMover = $cantidadMovida * $proporcionStock;
                    $nuevoStock = $stockActual - $stockAMover;

                    // Actualizar origen
                    if ($nuevaCantidadAsignada <= 0.001) {
                        // Transferencia total → Eliminar del origen
                        $origenModel->productos()->wherePivot('id', $pivotId)->detach();
                    } else {
                        // Transferencia parcial → Actualizar ambos campos
                        DB::table($origenInfo['table'])
                            ->where('id', $pivotId)
                            ->update([
                                'cantidad_asignada' => $nuevaCantidadAsignada,
                                'stock' => max(0, $nuevoStock),
                                'updated_at' => now()
                            ]);
                    }

                    // Transferir al destino
                    $destinoInfo = modeloDestino($request->destino_tipo);
                    if (!$destinoInfo) {
                        throw new \Exception("Tipo de destino no válido");
                    }

                    $destinoModel = ($destinoInfo['model'])::find($request->destino_id);
                    if (!$destinoModel) {
                        throw new \Exception("Destino no encontrado");
                    }

                    // Buscar si ya existe el mismo producto de la misma compra
                    $pivotDestino = $destinoModel->productos()
                        ->where('producto_id', $productoId)
                        ->wherePivot('detalle_compra_id', $detalleCompraId)
                        ->first();

                    if ($pivotDestino) {
                        // Ya existe → Sumar cantidad_asignada y stock 
                        $pivotDestinoId = $pivotDestino->pivot->id;
                        
                        DB::table($destinoInfo['table'])
                            ->where('id', $pivotDestinoId)
                            ->increment('cantidad_asignada', $cantidadMovida);
                        
                        DB::table($destinoInfo['table'])
                            ->where('id', $pivotDestinoId)
                            ->increment('stock', $stockAMover);
                            
                        DB::table($destinoInfo['table'])
                            ->where('id', $pivotDestinoId)
                            ->update(['updated_at' => now()]);
                    } else {
                        // No existe → Crear nueva fila
                        $destinoModel->productos()->attach($productoId, [
                            'cantidad_asignada' => $cantidadMovida,
                            'stock' => $stockAMover,
                            'detalle_compra_id' => $detalleCompraId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                }

                // Registrar detalle del movimiento
                MovimientoDetalle::create([
                    'movimiento_id' => $movimiento->id,
                    'producto_id'   => $productoId,
                    'cantidad'      => $cantidadMovida,
                    'detalle_compra_id' => $detalleCompraId,
                ]);
            }

            DB::commit();

            return redirect()->route('movimientos.index')
                ->with('mensaje', 'Movimiento registrado exitosamente.')
                ->with('icono', 'success');
                
        } catch (\Throwable $e) {
            DB::rollBack();
            
            /* ✅ Log para debugging
            Log::error('Error en movimiento: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);*/
            
            return redirect()->back()->withInput()
                ->with('titulo', 'Error en el movimiento')
                ->with('mensaje', $e->getMessage())
                ->with('icono', 'error');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movimiento = Movimiento::with(['detalles.producto', 'origen', 'destino', 'compra.detalle_compras.producto'])->find($id);
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
