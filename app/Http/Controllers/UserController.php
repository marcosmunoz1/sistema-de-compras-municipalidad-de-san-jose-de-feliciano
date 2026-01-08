<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contador = 1;
        $search = $request->input('search');

        // Convertir búsqueda a estado (booleano)
        $estadoBuscado = null;

        if ($search !== null) {
            $s = strtolower($search);

            if ($s === 'activo') {
                $estadoBuscado = 1;
            } elseif ($s === 'inactivo') {
                $estadoBuscado = 0;
            }
        }

        $usuarios = User::with(['roles'])
            ->withTrashed()->orderBy('id', 'desc')
            ->where(function ($query) use ($search, $estadoBuscado) {

                // Campos de texto básicos
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");

                // Búsqueda por rol
                $query->orWhereHas('roles', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });

                // Búsqueda por estado (activo/inactivo)
                if (!is_null($estadoBuscado)) {
                    $query->orWhere('estado', $estadoBuscado);
                }
            })
            ->paginate(10)->withQueryString();

        $roles = Role::all();
        $usuarioLogueado = auth()->user();


        return view('admin.usuarios.index', compact('usuarios', 'roles', 'contador', 'usuarioLogueado'));
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
            'firma' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser un texto válido.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede superar los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser un texto válido.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',

            'role.required' => 'Debe seleccionar un rol.',
            'role.string' => 'El rol enviado no es válido.',
            'role.exists' => 'El rol seleccionado no existe en el sistema.',

            'firma.image' => 'La firma debe ser una imagen.',
            'firma.mimes' => 'La firma debe ser un archivo JPG o PNG.',
            'firma.max'   => 'La firma no puede superar los 4 MB.',

        ]);

        $firmaPath = null;

        if ($request->hasFile('firma')) {
            $firmaPath = $request->file('firma')->store('firmas', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'firma' => $firmaPath,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = User::with(['roles', 'permissions'])->findOrFail($id);
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
    public function update(Request $request, $id )
    {
        $authUser = auth()->user();
        $user = User::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | PROTECCIÓN DE ROLES
        |--------------------------------------------------------------------------
        */

        // Si intenta editar a un Super-Admin
        if (
            $user->hasRole('Super-Admin') &&
            !$authUser->hasRole('Super-Admin')
        ) {
            return redirect()
                ->back()
                ->with('mensaje', 'No tenés permisos para editar este usuario.')
                ->with('icono', 'error');
        }

        // Si es Administrador y quiere editar a otro Administrador
        if (
            $authUser->hasRole('Administrador') &&
            $user->hasRole('Administrador') &&
            $authUser->id !== $user->id
        ) {
            return redirect()
                ->back()
                ->with('mensaje', 'No tenés permisos para editar este usuario.')
                ->with('icono', 'error');
        }


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
            'firma' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser un texto válido.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede superar los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.string' => 'La contraseña debe ser un texto válido.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',

            'role.required' => 'Debe seleccionar un rol.',
            'role.string' => 'El rol enviado no es válido.',
            'role.exists' => 'El rol seleccionado no existe en el sistema.',

            'firma.image' => 'La firma debe ser una imagen.',
            'firma.mimes' => 'La firma debe ser un archivo JPG o PNG.',
            'firma.max'   => 'La firma no puede superar los 4 MB.',
        ]);


        $user = User::findOrFail($id);

        /* ======================
        MANEJO DE FIRMA
        ====================== */
        if ($request->hasFile('firma')) {

            // Borrar firma anterior si existe
            if ($user->firma && Storage::disk('public')->exists($user->firma)) {
                Storage::disk('public')->delete($user->firma);
            }

            // Guardar nueva firma
            $user->firma = $request->file('firma')->store('firmas', 'public');
        }

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

        return redirect()->route('usuarios.index')
        ->with('mensaje', 'Usuario actualizado exitosamente.')
        ->with('icono', 'success');
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
