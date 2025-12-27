<?php

namespace App\Helpers;

class PermisoHelper
{
    protected static $traducciones = [
        // Admin
        'admin-index' => 'Ver panel admin',
        // Roles
        'roles-index' => 'Ver roles',
        'roles-store' => 'Crear rol',
        'roles-destroy' => 'Eliminar rol',
        'roles-asignar' => 'Asignar permisos',
        'roles-update_asignar' => 'Guardar asignación',
        // Permisos
        'permisos-index' => 'Ver permisos',
        'permisos-store' => 'Crear permiso',
        'permisos-destroy' => 'Eliminar permiso',
        // Usuarios
        'usuarios-index' => 'Ver usuarios',
        'usuarios-show' => 'Detalle usuario',
        'usuarios-store' => 'Crear usuario',
        'usuarios-edit' => 'Editar usuario',
        'usuarios-update' => 'Actualizar usuario',
        'usuarios-destroy' => 'Eliminar usuario',
        'usuarios-restore' => 'Restaurar usuario',
        // Proveedores
        'proveedores-index' => 'Ver proveedores',
        'proveedores-create' => 'Formulario crear',
        'proveedores-store' => 'Crear proveedor',
        'proveedores-edit' => 'Editar proveedor',
        'proveedores-update' => 'Actualizar proveedor',
        'proveedores-show' => 'Detalle proveedor',
        'proveedores-destroy' => 'Eliminar proveedor',
        'proveedores-restore' => 'Restaurar proveedor',
        // Categorías
        'categorias-index' => 'Ver categorías',
        'categorias-store' => 'Crear categoría',
        'categorias-destroy' => 'Eliminar categoría',
        'categorias-restore' => 'Restaurar categoría',
        'categorias-edit' => 'Editar categoría',
        // Productos
        'productos-index' => 'Ver productos',
        'productos-store' => 'Crear producto',
        'productos-data' => 'Obtener datos',
        'productos-update' => 'Actualizar producto',
        'productos-show' => 'Detalle producto',
        'productos-destroy' => 'Eliminar producto',
        'productos-restore' => 'Restaurar producto',
        // Combustibles
        'combustibles-index' => 'Ver combustibles',
        'combustibles-create' => 'Formulario crear',
        'combustibles-store' => 'Crear carga',
        'combustibles-edit' => 'Editar carga',
        'combustibles-update' => 'Actualizar carga',
        'combustibles-show' => 'Detalle carga',
        'combustibles-destroy' => 'Eliminar carga',
        'combustibles-restore' => 'Restaurar carga',
        'combustibles-update-prices' => 'Actualizar precios',
        'combustibles-report' => 'Imprimir reporte',
        // Vehículos
        'vehiculos-index' => 'Ver vehículos',
        'vehiculos-create' => 'Formulario crear',
        'vehiculos-store' => 'Crear vehículo',
        'vehiculos-edit' => 'Editar vehículo',
        'vehiculos-update' => 'Actualizar vehículo',
        'vehiculos-show' => 'Detalle vehículo',
        'vehiculos-destroy' => 'Eliminar vehículo',
        'vehiculos-restore' => 'Restaurar vehículo',
        // Empleados
        'empleados-index' => 'Ver empleados',
        'empleados-create' => 'Formulario crear',
        'empleados-store' => 'Crear empleado',
        'empleados-edit' => 'Editar empleado',
        'empleados-update' => 'Actualizar empleado',
        'empleados-show' => 'Detalle empleado',
        'empleados-destroy' => 'Eliminar empleado',
        'empleados-restore' => 'Restaurar empleado',
        // Compras
        'compras-index' => 'Ver compras',
        'compras-create' => 'Formulario crear',
        'compras-store' => 'Crear compra',
        'compras-edit' => 'Editar compra',
        'compras-update' => 'Actualizar compra',
        'compras-show' => 'Detalle compra',
        'compras-destroy' => 'Eliminar compra',
        'compras-restore' => 'Restaurar compra',
        'compras-report' => 'Imprimir reporte',
        // Obras
        'obras-index' => 'Ver obras',
        'obras-create' => 'Formulario crear',
        'obras-store' => 'Crear obra',
        'obras-edit' => 'Editar obra',
        'obras-update' => 'Actualizar obra',
        'obras-show' => 'Detalle obra',
        'obras-destroy' => 'Eliminar obra',
        'obras-restore' => 'Restaurar obra',
        // Equipos
        'equipos-index' => 'Ver equipos',
        'equipos-create' => 'Formulario crear',
        'equipos-store' => 'Crear equipo',
        'equipos-edit' => 'Editar equipo',
        'equipos-update' => 'Actualizar equipo',
        'equipos-show' => 'Detalle equipo',
        'equipos-destroy' => 'Eliminar equipo',
        'equipos-restore' => 'Restaurar equipo',
        // Movimientos
        'movimientos-index' => 'Ver movimientos',
        'movimientos-create' => 'Formulario crear',
        'movimientos-store' => 'Crear movimiento',
        'movimientos-show' => 'Detalle movimiento',
        // Auditoria
        'auditoria-index' => 'Ver auditorias',
        'auditoria-show' => 'Detalle auditoria',
        // Depósitos
        'depositos-index' => 'Ver depósitos',
        'depositos-show' => 'Detalle depósito',
        // Destinos
        'destinos-store' => 'Crear destino',

        //Backups
        'backups-index' => 'Ver backups',
        'backups-create' => 'Crear backup',
        'backups-download' => 'Descargar backup',
        'backups-verify' => 'Verificar backup',
        'backups-delete' => 'Eliminar backup'
    ];

    /**
     * Obtiene el nombre amigable de un permiso
     */
    public static function traducir(string $permiso): string
    {
        return self::$traducciones[$permiso] ?? $permiso;
    }

    /**
     * Obtiene todas las traducciones
     */
    public static function todas(): array
    {
        return self::$traducciones;
    }
}
