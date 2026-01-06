<?php

namespace App\Http\Controllers;

use App\Helpers\PermisoHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contador = 1;

        $roles = Role::query()->orderBy('id', 'desc')
            ->when(!auth()->user()->hasRole('Super-Admin'), function ($query) {
                $query->where('name', '!=', 'Super-Admin');
            })
            ->get();

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

            // 🔒 PROTECCIÓN DE ROLES CRÍTICOS
            if (in_array($role->name, ['Super-Admin', 'Administrador'])) {
                return redirect()->back()
                    ->with('mensaje', 'No podés editar este rol 🚫')
                    ->with('icono', 'error');
            }

            $role->name = $request->name;
            $role->save();

            return redirect()->route('admin.roles.index')
                ->with('mensaje', 'Rol actualizado correctamente')
                ->with('icono', 'success');
        }

        // ACCIÓN: VER (1) → no hace nada
        return redirect()->route('admin.roles.index');
    }

    public function asignar($id)
    {
        $rol = Role::find($id);
        $traducciones = PermisoHelper::todas();

        $permisos = Permission::all()->groupBy(function ($permiso) {
            if (stripos($permiso->name, 'usu') !== false) {
                return 'Usuarios';
            } elseif (stripos($permiso->name, 'rol') !== false) {
                return 'Roles';
            } elseif (stripos($permiso->name, 'perm') !== false || stripos($permiso->name, 'per') !== false) {
                return 'Permisos';
            } elseif (stripos($permiso->name, 'empl') !== false) {
                return 'Empleados';
            } elseif (stripos($permiso->name, 'prov') !== false) {
                return 'Proveedores';
            } elseif (stripos($permiso->name, 'comp') !== false) {
                return 'Compras';
            } elseif (stripos($permiso->name, 'mov') !== false) {
                return 'Movimientos';
            } elseif (stripos($permiso->name, 'prod') !== false) {
                return 'Productos';
            } elseif (stripos($permiso->name, 'comp') !== false) {
                return 'Compras';
            } elseif (stripos($permiso->name, 'obr') !== false) {
                return 'Obras';
            } elseif (stripos($permiso->name, 'cat') !== false) {
                return 'Categorías';
            } elseif (stripos($permiso->name, 'comb') !== false) {
                return 'Combustibles';
            }elseif (stripos($permiso->name, 'dep') !== false) {
                return 'Depositos';
            }elseif (stripos($permiso->name, 'veh') !== false) {
                return 'Vehiculos';
            }elseif (stripos($permiso->name, 'equi') !== false) {
                return 'Equipos';
            }elseif (stripos($permiso->name, 'aud') !== false) {
                return 'Auditoría';
            }

        })->map(function ($grupo) {
            return $grupo->sortBy('name');
        });

        // Dividir los permisos dentro de cada grupo en partes de 10
        $permisosDivididos = $permisos->map(function ($grupo) {
            return $grupo->chunk(10); // Divide cada grupo en subgrupos de 10 permisos
        });

        return view('admin.roles.asignar', compact('rol', 'permisosDivididos', 'permisos', 'traducciones'));
    }
    
    public function update_asignar(Request $request, $id)
    {
        $request->validate([
            'permisos' => 'required|array',
        ]);

        // Encontrar el rol
        $rol = Role::findOrFail($id);

        /** @var \App\Models\User $userLogueado */
        $userLogueado = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | PROTECCIÓN DE ROLES CRÍTICOS
        |--------------------------------------------------------------------------
        */

         $rolesProtegidos = ['Super-Admin', 'Administrador'];

        $esRolProtegido = in_array($rol->name, $rolesProtegidos);
        $esSuperAdmin   = $userLogueado->hasRole('Super-Admin');

        if ($esRolProtegido && !$esSuperAdmin) {
            return redirect()->back()
                ->with('mensaje', 'Solo un Super-Admin puede modificar este rol 🚫')
                ->with('icono', 'error');
        }

        /*
        |--------------------------------------------------------------------------
        | SINCRONIZAR PERMISOS
        |--------------------------------------------------------------------------
        */

        // Sincronizar permisos
        $rol->permissions()->sync($request->input('permisos'));

        // Limpiar cache de permisos de Spatie
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Refrescar a todos los usuarios que tengan ese rol
        foreach ($rol->users as $user) {
            $user->refresh(); // recarga relaciones y permisos en memoria
        }

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Permisos asignados para el Rol')
            ->with('icono', 'success');
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

        // 🔒 PROTECCIÓN DE ROLES CRÍTICOS
        if (in_array($role->name, ['Super-Admin', 'Administrador'])) {
            return redirect()->back()
                ->with('mensaje', 'No podés eliminar este rol 🚫')
                ->with('icono', 'error');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
                ->with('success', 'Rol eliminado correctamente');
    }
}
