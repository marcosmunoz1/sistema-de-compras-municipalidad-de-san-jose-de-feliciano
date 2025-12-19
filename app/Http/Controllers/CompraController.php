<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Detalle_compra;
use App\Models\Empleado;
use App\Models\Movimiento;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = Compra::withTrashed()->orderBy('id', 'desc');

        if ($search) {

            // 🧠 Detectar si viene una fecha DD/MM/YYYY
            $fechaFormateada = null;

            if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $search)) {
                try {
                    $fechaFormateada = \Carbon\Carbon::createFromFormat('d/m/Y', $search)
                        ->format('Y-m-d');
                } catch (\Exception $e) {
                    $fechaFormateada = null;
                }
            }

            $query->where(function ($q) use ($search, $fechaFormateada) {
                $q->where('nr_orden', 'like', "%{$search}%")
                ->orWhere('estado_compra', 'like', "%{$search}%")
                ->orWhereHas('proveedor', function ($q) use ($search) {
                    $q->where('nombre', 'LIKE', "%{$search}%");
                });

                // 🔍 Buscar por fecha SOLO si se pudo convertir
                if ($fechaFormateada) {
                    $q->orWhereDate('fecha_orden', $fechaFormateada);
                }
            });
        }

        $compras = $query->paginate(10)->withQueryString();

        return view('admin.compras.index', compact('compras'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)  
    {    
        $categorias = Categoria::all();  
        $proveedores = Proveedor::all();
        $empleados = Empleado::all();
        $search = $request->input('search'); 
        $productos = Producto::all();
        return view('admin.compras.create', compact('proveedores', 'empleados', 'categorias', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        // return response()->json($request->all());
        $request->validate([
            'fecha_orden' => 'required',
            'empleado_id' => 'required',
            'proveedor_id' => 'required',
            'sub_cuenta' => 'required',
            'productos' => 'required|array|min:1',
            'cantidades' => 'required|array|min:1',
            'asunto_obra_automotor' => 'required',
        ]);

        // Generar número de orden
        $lastOrder = Compra::max('nr_orden');
        $newOrder = $lastOrder ? $lastOrder + 1 : 13000;
        $nr_orden = str_pad($newOrder, 8, '0', STR_PAD_LEFT);

        // Crear la compra
        $compra = Compra::create([
            'proveedor_id'   => $request->proveedor_id,
            'empleado_id'    => $request->empleado_id,
            'destino_tipo'   => modeloDestino($request->destino_tipo)['model'],
            'destino_id'     => $request->destino_id,
            'area_solicitante' => 'Corralon Municipal - Compras',
            'nr_orden'       => $nr_orden,
            'sub_cuenta'     => $request->sub_cuenta,
            'fecha_orden'    => $request->fecha_orden,
            'estado_compra'  => 'Pendiente de factura',
            'asunto_obra_automotor' => $request->asunto_obra_automotor,
            'observacion'    => $request->observacion,
            'estado'         => true,
        ]);

        foreach ($request->productos as $index => $producto_id) {

        $cantidad = $request->cantidades[$index];

        // Crear detalle de compra
        $detalleCompra = Detalle_compra::create([
            'compra_id'   => $compra->id,
            'producto_id' => $producto_id,
            'cantidad'    => $cantidad,
        ]);

        // Registrar movimiento
        Movimiento::create([
            'compra_id'     => $compra->id,
            'tipo'          => 'entrada',
            'origen_tipo'   => Proveedor::class,
            'origen_id'     => $request->proveedor_id,
            'destino_tipo'  => modeloDestino($request->destino_tipo)['model'],
            'destino_id'    => $request->destino_id,
            'observacion'   => $request->asunto_obra_automotor,
            'fecha'         => $request->fecha_orden,
            'estado'        => true
        ]);

        // Carga al destino
        $destinoInfo  = modeloDestino($request->destino_tipo);
        $destinoClass = $destinoInfo['model'];
        $campoCantidad = $destinoInfo['campo']; // cantidad_asignada
        $destinoModel = $destinoClass::find($request->destino_id);

        // Buscar fila pivote que corresponda a esta misma compra
        $filaMismaCompra = $destinoModel->productos()
            ->wherePivot('detalle_compra_id', $detalleCompra->id)
            ->wherePivot('producto_id', $producto_id)
            ->first();

        if ($filaMismaCompra) {

            // Si existe una entrada de la misma compra → actualizar ambas columnas
            $destinoModel->productos()->updateExistingPivot($producto_id, [
                $campoCantidad   => $filaMismaCompra->pivot->{$campoCantidad} + $cantidad,
                'stock'   => $filaMismaCompra->pivot->stock_actual + $cantidad,
            ]);

        } else {

            // Crear siempre una nueva fila por compra distinta
            $destinoModel->productos()->attach($producto_id, [
                $campoCantidad   => $cantidad,
                'stock'   => $cantidad, // ↓↓↓ NUEVO
                'detalle_compra_id' => $detalleCompra->id
            ]);
        }
    }


        return redirect()
            ->route('compras.index')
            ->with('mensaje', 'Orden de compra realizada correctamente')
            ->with('icono', 'success');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = Crypt::decryptString($id);
        $from = $request->input('from');  
        $vehiculoId = $request->input('vehiculo_id'); // si vino desde vehículo
        $obraId = $request->input('obra_id');
        $depositoId = $request->input('deposito_id');

        $compra = Compra::with('detalle_compras','empleado','proveedor','destino')->findOrFail($id);
        return view('admin.compras.show', compact('compra','from','vehiculoId','obraId','depositoId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decryptString($id); 
        $compra = Compra::with('detalle_compras','proveedor')->findOrFail($id);
        $categorias = Categoria::all();  
        $proveedores = Proveedor::all();
        $empleados = Empleado::all();
        $productos = Producto::all();
        return view('admin.compras.edit', compact('empleados', 'categorias', 'productos','compra'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
       //return response()->json($request->all());
        // 1. Validación mínima
        $request->validate([
            'precios' => 'required|array',
            'precios.*' => 'nullable',
            'foto_factura' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:5120', // 5MB
        ],
        [
            'foto_factura.file'  => 'El archivo de la factura no es válido.',
            'foto_factura.mimes' => 'La factura debe ser una imagen (JPG, PNG, WEBP) o un archivo PDF.',
            'foto_factura.max'   => 'La factura no puede superar los 5 MB.',
        ]);

        // 2. Buscar la compra
        $compra = Compra::with('detalle_compras')->findOrFail($id);

        $total = 0;

        // 3. Recorrer los detalles y actualizar
        foreach ($compra->detalle_compras as $detalle) {

            // Si vino precio para ese detalle
            if (isset($request->precios[$detalle->id])) {

                 $raw = $request->precios[$detalle->id];

                // Normalizar  
                $sinMiles = str_replace('.', '', $raw);       // quita puntos de miles(formato local)
                $estandar = str_replace(',', '.', $sinMiles); // coma -> punto (formato decimal)
                $nuevoPrecio = (float) $estandar;

                // Guardamos el precio limpio
                $detalle->precio = $nuevoPrecio;

                // Recalculamos subtotal
                $detalle->subtotal = $nuevoPrecio * $detalle->cantidad;

                $detalle->save();
            }

            // Sumamos al total
            $total += $detalle->subtotal;
        }
        // Manejo de la foto o PDF de la factura
        if ($request->hasFile('foto_factura')) {
            $path = $request->file('foto_factura')
                ->store('facturas', 'public');

            $compra->foto_factura = $path;
        }

        // 4. Actualizamos el total de la compra
        $compra->total = $total;
        $compra->estado_compra = 'Finalizada';
        $compra->save();

        return redirect()
            ->route('compras.index')
            ->with('mensaje', 'La compra fue actualizada  correctamente')
            ->with('icono', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
