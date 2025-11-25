<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [

            // ===============================
            // CONFIGURACIÓN / DASHBOARD
            // ===============================
            ['name' => 'admin-index'],

            // ===============================
            // ROLES
            // ===============================
            ['name' => 'roles-ver'],      // index
            ['name' => 'roles-crear'],    // store
            ['name' => 'roles-eliminar'], // destroy

            // ===============================
            // PERMISOS
            // ===============================
            ['name' => 'permisos-ver'],   // index

            // ===============================
            // USUARIOS
            // ===============================
            ['name' => 'usuarios-ver'],       // index, show
            ['name' => 'usuarios-crear'],     // store
            ['name' => 'usuarios-editar'],    // edit, update
            ['name' => 'usuarios-eliminar'],  // destroy
            ['name' => 'usuarios-restaurar'], // restore

            // ===============================
            // PROVEEDORES
            // ===============================
            ['name' => 'proveedores-ver'],       // index, show
            ['name' => 'proveedores-crear'],     // create, store
            ['name' => 'proveedores-editar'],    // edit, update
            ['name' => 'proveedores-eliminar'],  // destroy
            ['name' => 'proveedores-restaurar'], // restore

            // ===============================
            // CATEGORÍAS
            // ===============================
            ['name' => 'categorias-ver'],       // index
            ['name' => 'categorias-crear'],     // store
            ['name' => 'categorias-eliminar'],  // destroy
            ['name' => 'categorias-restaurar'], // restore

            // ===============================
            // PRODUCTOS
            // ===============================
            ['name' => 'productos-ver'],       // index, show, data
            ['name' => 'productos-crear'],     // store
            ['name' => 'productos-editar'],    // update
            ['name' => 'productos-eliminar'],  // destroy
            ['name' => 'productos-restaurar'], // restore

            // ===============================
            // COMBUSTIBLES
            // ===============================
            ['name' => 'combustibles-ver'],        // index, show
            ['name' => 'combustibles-crear'],      // create, store
            ['name' => 'combustibles-editar'],     // edit, update
            ['name' => 'combustibles-eliminar'],   // destroy
            ['name' => 'combustibles-restaurar'],  // restore
            ['name' => 'combustibles-actualizar-precios'], // update-prices
            ['name' => 'combustibles-imprimir'],   // report

            // ===============================
            // VEHÍCULOS
            // ===============================
            ['name' => 'vehiculos-ver'],        // index, show
            ['name' => 'vehiculos-crear'],      // create, store
            ['name' => 'vehiculos-editar'],     // edit, update
            ['name' => 'vehiculos-eliminar'],   // destroy
            ['name' => 'vehiculos-restaurar'],  // restore

            // ===============================
            // EMPLEADOS
            // ===============================
            ['name' => 'empleados-ver'],        // index, show
            ['name' => 'empleados-crear'],      // create, store
            ['name' => 'empleados-editar'],     // edit, update
            ['name' => 'empleados-eliminar'],   // destroy
            ['name' => 'empleados-restaurar'],  // restore
        ];

        // Crear permisos si no existen
        foreach ($permisos as $permiso) {
            Permission::firstOrCreate($permiso);
        }

        // Crear rol Super-Admin con TODOS los permisos
        $superAdminRole = Role::firstOrCreate(['name' => 'Super-Admin']);
        $superAdminRole->syncPermissions(Permission::all());

        // Usuario superadmin
        $superAdmin = \App\Models\User::firstOrCreate(
            ['email' => 'superadmin@developer.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123456789'),
            ]
        );

        $superAdmin->assignRole($superAdminRole);

        $this->command->info('Super-Admin creado con todos los permisos');
    }
}