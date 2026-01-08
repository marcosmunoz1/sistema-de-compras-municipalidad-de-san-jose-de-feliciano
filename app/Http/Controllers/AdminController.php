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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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

        // Datos para gráficos (con caché de 1 hora)
        
        // Gastos mensuales en compras (año actual)
        $gastosComprasMensuales = Cache::remember('dashboard_gastos_compras', 3600, function() {
            return Compra::selectRaw('MONTH(fecha_orden) as mes, SUM(total) as monto_total, COUNT(*) as cantidad')
                ->whereYear('fecha_orden', date('Y'))
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();
        });

        // Cargas de combustible mensuales (año actual)
        $cargasCombustibleMensuales = Cache::remember('dashboard_cargas_combustible', 3600, function() {
            return Combustible::selectRaw('MONTH(fecha) as mes, SUM(monto) as monto_total, SUM(litros) as litros_total, COUNT(*) as cantidad')
                ->whereYear('fecha', date('Y'))
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();
        });

        // Top 10 productos más comprados
        $productosMasComprados = Cache::remember('dashboard_productos_top', 3600, function() {
            return DB::table('detalle_compras')
                ->join('productos', 'detalle_compras.producto_id', '=', 'productos.id')
                ->select('productos.nombre', DB::raw('SUM(detalle_compras.cantidad) as total_cantidad'))
                ->groupBy('productos.id', 'productos.nombre')
                ->orderBy('total_cantidad', 'desc')
                ->limit(10)
                ->get();
        });

        // Vehículos con más cargas de combustible
        $vehiculosMasCargas = Cache::remember('dashboard_vehiculos_cargas', 3600, function() {
            return DB::table('combustibles')
                ->join('vehiculos', function($join) {
                    $join->on('combustibles.destino_id', '=', 'vehiculos.id')
                         ->where('combustibles.destino_tipo', '=', 'App\\Models\\Vehiculo');
                })
                ->select('vehiculos.patente', DB::raw('COUNT(*) as total_cargas'), DB::raw('SUM(combustibles.litros) as litros_total'))
                ->groupBy('vehiculos.id', 'vehiculos.patente')
                ->orderBy('total_cargas', 'desc')
                ->limit(8)
                ->get();
        });

        // Top 6 proveedores con más compras
        $topProveedoresCompras = Cache::remember('dashboard_top_proveedores', 3600, function() {
            return DB::table('compras')
                ->join('proveedores', 'compras.proveedor_id', '=', 'proveedores.id')
                ->select('proveedores.nombre', DB::raw('COUNT(*) as total_compras'), DB::raw('SUM(compras.total) as monto_total'))
                ->groupBy('proveedores.id', 'proveedores.nombre')
                ->orderBy('total_compras', 'desc')
                ->limit(6)
                ->get();
        });

        // Empleados que más solicitan compras
        $empleadosMasSolicitudes = Cache::remember('dashboard_empleados_solicitudes', 3600, function() {
            return DB::table('compras')
                ->join('empleados', 'compras.empleado_id', '=', 'empleados.id')
                ->select('empleados.nombre', DB::raw('COUNT(*) as total_solicitudes'), DB::raw('SUM(compras.total) as monto_total'))
                ->groupBy('empleados.id', 'empleados.nombre')
                ->orderBy('total_solicitudes', 'desc')
                ->limit(8)
                ->get();
        });

        // Obras con más movimientos
        $obrasMasMovimientos = Cache::remember('dashboard_obras_movimientos', 3600, function() {
            return DB::table('movimientos')
                ->join('obras', function($join) {
                    $join->on('movimientos.destino_id', '=', 'obras.id')
                         ->where('movimientos.destino_tipo', '=', 'App\\Models\\Obra');
                })
                ->select('obras.nombre', DB::raw('COUNT(*) as total_movimientos'))
                ->groupBy('obras.id', 'obras.nombre')
                ->orderBy('total_movimientos', 'desc')
                ->limit(6)
                ->get();
        });

        // Distribución de movimientos por tipo de destino
        $movimientosPorTipo = Cache::remember('dashboard_movimientos_tipo', 3600, function() {
            return Movimiento::selectRaw('destino_tipo, COUNT(*) as total')
                ->groupBy('destino_tipo')
                ->get()
                ->map(function($item) {
                    $tipo = $item->destino_tipo;
                    $nombre = class_basename($tipo);
                    return [
                        'tipo' => $nombre,
                        'total' => $item->total
                    ];
                });
        });

        // Depósitos con más movimientos
        $depositosMasMovimientos = Cache::remember('dashboard_depositos_movimientos', 3600, function() {
            return DB::table('movimientos')
                ->join('depositos', function($join) {
                    $join->on('movimientos.origen_id', '=', 'depositos.id')
                         ->where('movimientos.origen_tipo', '=', 'App\\Models\\Deposito');
                })
                ->select('depositos.nombre', DB::raw('COUNT(*) as total_movimientos'))
                ->groupBy('depositos.id', 'depositos.nombre')
                ->orderBy('total_movimientos', 'desc')
                ->limit(6)
                ->get();
        });

        // Compras pendientes de factura (últimas 10)
        $comprasPendientesFactura = Cache::remember('dashboard_compras_pendientes', 1800, function() {
            return Compra::with(['proveedor', 'empleado'])
                ->where('estado_compra', 'Pendiente de factura')
                ->orderBy('fecha_orden', 'desc')
                ->limit(10)
                ->get();
        });

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
            'cantidadPermisos',
            'gastosComprasMensuales',
            'cargasCombustibleMensuales',
            'productosMasComprados',
            'vehiculosMasCargas',
            'topProveedoresCompras',
            'empleadosMasSolicitudes',
            'obrasMasMovimientos',
            'movimientosPorTipo',
            'depositosMasMovimientos',
            'comprasPendientesFactura'
        ));
    }
}
