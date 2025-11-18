<?php

namespace App\Http\Controllers;

use App\Models\Proveedor; 
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all(); 
        return view('admin.proveedores.index', compact('proveedores')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
      return view('admin.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'localidad' => 'required|string|max:255', 
            'provincia' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'razon_social' => 'required|nullable|string|max:255',
            'cuit' => 'required|nullable|string|max:255',
            'telefono' => 'required|nullable|string|max:255',
            'celular' => 'required|string|max:255',
            'email' => 'required|nullable|email|max:255',
            'codigo_postal' => 'required|nullable|string|max:255',
            'direccion' => 'required|string|max:255'
        ]); 

        $provedor = new Proveedor();
        $provedor->localidad = $request->localidad;
        $provedor->provincia = $request->provincia;
        $provedor->pais = $request->pais;
        $provedor->empresa = $request->empresa;
        $provedor->nombre = $request->nombre;
        $provedor->razon_social = $request->razon_social;
        $provedor->cuit = $request->cuit;
        $provedor->telefono = $request->telefono;
        $provedor->celular = $request->celular;
        $provedor->email = $request->email;
        $provedor->codigo_postal = $request->codigo_postal;
        $provedor->direccion = $request->direccion;
        $provedor->observaciones = $request->observaciones; 
        $provedor->save();

        return redirect()->route('proveedores.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(ProveedorController $proveedorController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProveedorController $proveedorController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProveedorController $proveedorController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProveedorController $proveedorController)
    {
        //
    }
}
