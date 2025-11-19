<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contador = 1;
        $usuarios = User::withTrashed()
        ->with('roles')     // carga los roles del usuario
        ->get();
        $roles = Role::all();
        return view('admin.usuarios.index', compact('usuarios', 'roles', 'contador')); 
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = User::with('roles')->findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'role' => 'required|string|exists:roles,name',
            'estado' => 'nullable|boolean',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        if ($request->has('estado')) {
            $user->estado = $request->estado;
        }
        else {
            $user->estado = 0;
        }
        $user->save();

        $user->syncRoles([$request->role]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        // Marca como inactivo
        $usuario->estado = false;
        $usuario->save();

        // Soft delete
        $usuario->delete();

        return redirect()->back()->with('success', 'Usuario eliminado y marcado como inactivo.');
    }


    public function restore($id)
    {
        $usuario = User::withTrashed()->findOrFail($id);
        // Marca como inactivo
        $usuario->restore();
        $usuario->estado = true;
        $usuario->save();

        return back()->with('success', 'Usuario restaurado correctamente.');
    }

}
