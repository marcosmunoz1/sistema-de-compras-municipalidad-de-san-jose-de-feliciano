<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contador = 1;
        $roles = Role::all();
        return view('admin.roles.index', compact('contador', 'roles'));
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
        // Validación
        $request->validate(
            [
                'name' => 'required|string|max:255|unique:roles,name,' . $request->id,
            ],
            [
                'name.required' => 'El campo nombre no puede estar vacío',
                'name.unique' => 'El Rol ya está registrado.',
            ]
        );

        // ACCIÓN: AGREGAR (0)
        if ($request->input('accion') == "0") {

            $role = new Role();
            $role->name = $request->name;
            $role->save();

            return redirect()->route('admin.roles.index')
                ->with('mensaje', 'Rol creado correctamente')
                ->with('icono', 'success');
        }

        // ACCIÓN: EDITAR (2)
        if ($request->input('accion') == "2") {

            $role = Role::findOrFail($request->id);
            $role->name = $request->name;
            $role->save();

            return redirect()->route('admin.roles.index')
                ->with('mensaje', 'Rol actualizado correctamente')
                ->with('icono', 'success');
        }

        // ACCIÓN: VER (1) → no hace nada
        return redirect()->route('admin.roles.index');
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
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index')
                ->with('success', 'Rol eliminado correctamente');
    }
}
