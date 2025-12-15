<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Combustible;
use App\Models\Compra;
use App\Models\Deposito;
use App\Models\Empleado;
use App\Models\Movimiento;
use App\Models\Obra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $cantidadProveedores = Proveedor::count();
        $cantidadRoles = Role::count();
        $cantidadUsuarios = User::count();
        $cantidadProductos = Producto::count();
        $cantidadCategorias = Categoria::count();
        $cantidadCompras = Compra::count();
        $cantidadVehiculos = Vehiculo::count();
        $cantidadCombustibles = Combustible::count();
        $cantidadObras = Obra::count();
        $cantidadMovimientos = Movimiento::count();
        $cantidadEmpleados = Empleado::count();
        $cantidadDepositos = Deposito::count();
        $cantidadPermisos = Permission::count();
        return view('admin.index', compact(
            'cantidadProveedores',
            'cantidadUsuarios',
            'cantidadProductos',
            'cantidadCompras',
            'cantidadVehiculos',
            'cantidadCombustibles',
            'cantidadObras',
            'cantidadMovimientos',
            'cantidadCategorias',
            'cantidadEmpleados',
            'cantidadRoles',
            'cantidadDepositos',
            'cantidadPermisos'
        ));
    }
}
