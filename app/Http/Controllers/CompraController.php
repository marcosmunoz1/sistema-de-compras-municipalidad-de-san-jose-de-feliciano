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
                $query->where('nr_orden', 'like', "%{$search}%")
                      ->orWhere('fecha_orden', 'like', "%{$search}%");
            }
            $compras = $query->paginate(2); 
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
            'proveedor_id' => $request->proveedor_id,
            'empleado_id' => $request->empleado_id,
            'destino_tipo' => modeloDestino($request->destino_tipo),   // <── helper
            'destino_id' => $request->destino_id,    
            'area_solicitante' => 'Corralon Municipal - Compras', 
            'nr_orden' => $nr_orden,   
            'sub_cuenta' => $request->sub_cuenta,
            'fecha_orden' => $request->fecha_orden, 
            'estado_compra' => 'Pendiente de factura',    
            'asunto_obra_automotor' => $request->asunto_obra_automotor, 
            'observacion' => $request->observacion,  
            'estado' => true, 
        ]);

        // Insertar detalles y movimientos
        foreach ($request->productos as $index => $producto_id) {

            $cantidad = $request->cantidades[$index];

            // Guardar detalle
            Detalle_compra::create([
                'compra_id' => $compra->id,
                'producto_id' => $producto_id,
                'cantidad' => $cantidad,
            ]);

            // Guardar movimiento
            Movimiento::create([
                'producto_id' => $producto_id,
                'compra_id' => $compra->id,
                'tipo' => 'entrada',
                'origen_tipo'   => Proveedor::class,   // <── modelo REAL
                'origen_id'     => $request->proveedor_id,
                'destino_tipo'  => modeloDestino($request->destino_tipo),  // <── helper
                'destino_id'    => $request->destino_id,
                'cantidad'      => $cantidad,
                'observacion'   => $request->asunto_obra_automotor,
                'fecha'         => $request->fecha_orden,
                'estado'        => true
            ]);
        }

        return redirect()
            ->route('compras.index')
            ->with('mensaje', 'Orden de compra realizada correctamente')
            ->with('icono', 'success');
    }


    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
