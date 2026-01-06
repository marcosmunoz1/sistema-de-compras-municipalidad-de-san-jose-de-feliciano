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
            ['name' => 'roles-index'],
            ['name' => 'roles-show'],
            ['name' => 'roles-edit'],
            ['name' => 'roles-store'],
            ['name' => 'roles-destroy'],
            ['name' => 'roles-asignar'],
            ['name' => 'roles-update_asignar'],

            // ===============================
            // PERMISOS
            // ===============================
            ['name' => 'permisos-index'],
            ['name' => 'permisos-show'],
            ['name' => 'permisos-edit'],
            ['name' => 'permisos-store'],
            ['name' => 'permisos-destroy'],

            // ===============================
            // USUARIOS
            // ===============================
            ['name' => 'usuarios-index'],
            ['name' => 'usuarios-show'],
            ['name' => 'usuarios-store'],
            ['name' => 'usuarios-edit'],
            ['name' => 'usuarios-update'],
            ['name' => 'usuarios-destroy'],
            ['name' => 'usuarios-restore'],

            // ===============================
            // PROVEEDORES
            // ===============================
            ['name' => 'proveedores-index'],
            ['name' => 'proveedores-create'],
            ['name' => 'proveedores-store'],
            ['name' => 'proveedores-edit'],
            ['name' => 'proveedores-update'],
            ['name' => 'proveedores-show'],
            ['name' => 'proveedores-destroy'],
            ['name' => 'proveedores-restore'],

            // ===============================
            // CATEGORÍAS
            // ===============================
            ['name' => 'categorias-index'],
            ['name' => 'categorias-edit'],
            ['name' => 'categorias-store'],
            ['name' => 'categorias-destroy'],
            ['name' => 'categorias-restore'],

            // ===============================
            // PRODUCTOS
            // ===============================
            ['name' => 'productos-index'],
            ['name' => 'productos-store'],
            ['name' => 'productos-data'],
            ['name' => 'productos-update'],
            ['name' => 'productos-show'],
            ['name' => 'productos-destroy'],
            ['name' => 'productos-restore'],

            // ===============================
            // COMBUSTIBLES
            // ===============================
            ['name' => 'combustibles-index'],
            ['name' => 'combustibles-create'],
            ['name' => 'combustibles-store'],
            ['name' => 'combustibles-edit'],
            ['name' => 'combustibles-update'],
            ['name' => 'combustibles-show'],
            ['name' => 'combustibles-destroy'],
            ['name' => 'combustibles-restore'],
            ['name' => 'combustibles-update-prices'],
            ['name' => 'combustibles-report'],

            // ===============================
            // VEHÍCULOS
            // ===============================
            ['name' => 'vehiculos-index'],
            ['name' => 'vehiculos-create'],
            ['name' => 'vehiculos-store'],
            ['name' => 'vehiculos-edit'],
            ['name' => 'vehiculos-update'],
            ['name' => 'vehiculos-show'],
            ['name' => 'vehiculos-destroy'],
            ['name' => 'vehiculos-restore'],

            // ===============================
            // EMPLEADOS
            // ===============================
            ['name' => 'empleados-index'],
            ['name' => 'empleados-create'],
            ['name' => 'empleados-store'],
            ['name' => 'empleados-edit'],
            ['name' => 'empleados-update'],
            ['name' => 'empleados-show'],
            ['name' => 'empleados-destroy'],
            ['name' => 'empleados-restore'],

            // ===============================
            // COMPRAS
            // ===============================
            ['name' => 'compras-index'],
            ['name' => 'compras-create'],
            ['name' => 'compras-store'],
            ['name' => 'compras-edit'],
            ['name' => 'compras-update'],
            ['name' => 'compras-show'],
            ['name' => 'compras-destroy'],
            ['name' => 'compras-restore'],
            ['name' => 'compras-report'],

            // ===============================
            // OBRAS
            // ===============================
            ['name' => 'obras-index'],
            ['name' => 'obras-create'],
            ['name' => 'obras-store'],
            ['name' => 'obras-edit'],
            ['name' => 'obras-update'],
            ['name' => 'obras-show'],
            ['name' => 'obras-destroy'],
            ['name' => 'obras-restore'],

            // ===============================
            // EQUIPOS
            // ===============================
            ['name' => 'equipos-index'],
            ['name' => 'equipos-create'],
            ['name' => 'equipos-store'],
            ['name' => 'equipos-edit'],
            ['name' => 'equipos-update'],
            ['name' => 'equipos-show'],
            ['name' => 'equipos-destroy'],
            ['name' => 'equipos-restore'],

            // ===============================
            // MOVIMIENTOS
            // ===============================
            ['name' => 'movimientos-index'],
            ['name' => 'movimientos-create'],
            ['name' => 'movimientos-store'],
            ['name' => 'movimientos-show'],

            // ===============================
            // AUDITORIA
            // ===============================
            ['name' => 'auditoria-index'],
            ['name' => 'auditoria-show'],

            // ===============================
            // DEPÓSITOS
            // ===============================
            ['name' => 'depositos-index'],
            ['name' => 'depositos-show'],

            // ===============================
            // DESTINOS
            // ===============================
            ['name' => 'destinos-store'],

            // ===============================
            // BACKUPS
            // ===============================
            ['name' => 'backups-index'],
            ['name' => 'backups-create'],
            ['name' => 'backups-download'],
            ['name' => 'backups-verify'],
            ['name' => 'backups-delete'],
        ];

        // Crear permisos si no existen
        foreach ($permisos as $permiso) {
            Permission::firstOrCreate($permiso);
        }

        // Crear rol Super-Admin con TODOS los permisos
        $superAdminRole = Role::firstOrCreate(['name' => 'Super-Admin']);
        $superAdminRole->syncPermissions(Permission::all());

        // Usuario superadmin1
        $superAdmin1 = \App\Models\User::firstOrCreate(
            ['email' => 'nicodemaur@gmail.com'],
            [
                'name' => 'Nicolas De Mauri',
                'password' => Hash::make('123456789'),
            ]
        );

        $superAdmin1->assignRole($superAdminRole);

        // Usuario superadmin2
        $superAdmin2 = \App\Models\User::firstOrCreate(
            ['email' => 'marcosdavidmunoz17@gmail.com'],
            [
                'name' => 'Marcos Muñoz',
                'password' => Hash::make('123456789'),
            ]
        );

        $superAdmin2->assignRole($superAdminRole);

        // Crear rol Administrador con TODOS los permisos
        $administradorRole = Role::firstOrCreate(['name' => 'Administrador']);
        $administradorRole->syncPermissions(Permission::all());

        // Usuario administrador
        $administrador = User::firstOrCreate(
            ['email' => 'damianarevalo@gmail.com'],
            [
                'name'=> 'Damian Arevalo',
                'password' => Hash::make('123456789'),
            ]
        );

        $administrador->syncPermissions(Permission::all());

        $this->command->info('Super-Admin creado con todos los permisos');
        $this->command->info('Administrador creado con todos los permisos');
    }
}