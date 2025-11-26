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
    public function index()
    {
        $compras = Compra::all();
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
        $productos = Producto::where('nombre', 'LIKE', "%{$search}%")  
            ->orWhere('descripcion', 'LIKE', "%{$search}%")
            ->orWhere('unidad', 'LIKE', "%{$search}%")
            ->orWhere('estado', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('admin.compras.create', compact('proveedores', 'empleados', 'categorias', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return response()->json($request->all());

       $request->validate([
           'fecha_orden' => 'required',
           'empleado_id' => 'required',
           'area_solicitante' => 'required', 
           'proveedor_id' => 'required',
           'productos' => 'required',
           'cantidades' => 'required',
           'observaciones' => 'required',
           'asunto_obra_automotor' => 'required', 
       ]);

       $compra = Compra::create([
           'proveedor_id' => $request->proveedor_id,
           'empleado_id' => $request->empleado_id,
           'destino_tipo' => $request->destino_tipo,
           'destino_id' => $request->destino_id,    
           'area_solicitante' => 'Corralon Municipal - Compras', 
           'nr_orden' => $id,
           'sub_cuenta' =>$request->sub_cuenta, 
           'fecha_orden' => $request->fecha_orden, 
           'estado_compra' => 'Registrado',  
           'asunto_obra_automotor' => $request->asunto_obra_automotor, 
           'cantidades' => $request->cantidades,
           'observacion' => $request->observacion,  
           'estado' => true, 
       ]); 

       // insertar detalle

       $detalle = Detalle_compra::create([ 
        'compra_id' => $compra->id,
        'producto_id' => $request->producto_id,
        'cantidad' => $request->cantidad, 
       ]);

        Movimiento::create([ 
        'producto_id' => $detalle->producto_id,
        'tipo' => 'entrada',
        'origen_tipo' => 'proveedor',
        'origen_id' => $request->proveedor_id,
        'destino_tipo' => $request->destino_tipo,
        'destino_id' => $request->destino_id,
        'cantidad' => $detalle->cantidad,
        'fecha' => now(),
        ]);
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
