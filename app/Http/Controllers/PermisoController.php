<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission; 

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)  
    {    
        $totalPermisos = Permission::count();
        $search = $request->get('search'); 
        $query = Permission::orderBy('id', 'desc');   
        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }
        $permisos = $query->paginate(10); 
        return view('admin.permisos.index', compact('permisos','totalPermisos'));  
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|unique:permissions,name'
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.unique' => 'El nombre ya esta registrado.'
        ]);

        if ($request->input('accion') == "1") {

            $permiso = new Permission();
            $permiso->name = $request->name;
            $permiso->save();

            return redirect()->route('permisos.index')
                ->with('mensaje', 'Permiso registrado con exíto')
                ->with('icono', 'success');
        }
        // ACCIÓN: EDITAR
        if ($request->input('accion') == "2") {
            $permiso = Permission::findOrfail($request->id);
            $permiso->name = $request->name;
            $permiso->save(); 
             
            return redirect()->route('permisos.index')
            ->with('mensaje', 'Permiso Actualizado con exíto')
            ->with('icono', 'success'); 
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permiso = Permission::findOrFail($id); 
        $permiso->delete(); 

        return redirect()->back()
        ->with('mensaje', 'El permiso se ha eliminado.') 
        ->with('icono', 'success');  
    }
}
