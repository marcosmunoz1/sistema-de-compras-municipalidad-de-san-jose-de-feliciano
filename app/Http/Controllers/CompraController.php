<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Empleado;
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
        $productos = Producto::all();
        return view('admin.compras.create', compact('proveedores', 'empleados', 'categorias', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return response()->json($request->all()); 
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
