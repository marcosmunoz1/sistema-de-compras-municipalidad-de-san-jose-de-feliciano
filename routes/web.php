<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/* Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/admin');
    }

    return redirect('/login');
});
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth', 'can:admin-index');

//Rutas para compras
Route::get('/admin/compras', [App\Http\Controllers\CompraController::class, 'index'])->name('compras.index')->middleware('auth', 'can:compras-index');
Route::get('/admin/compras/create', [App\Http\Controllers\CompraController::class, 'create'])->name('compras.create')->middleware('auth', 'can:compras-create');
Route::get('/admin/compras/reporte/preview', [App\Http\Controllers\PDFController::class, 'previewReporteCompras'])->name('compras.reporte.preview')->middleware('auth', 'can:compras-index');
Route::get('/admin/compras/reporte/html', [App\Http\Controllers\PDFController::class, 'htmlReporteCompras'])->name('compras.reporte.html')->middleware('auth', 'can:compras-index');
Route::get('/admin/compras/reporte/download', [App\Http\Controllers\PDFController::class, 'downloadReporteCompras'])->name('compras.reporte.download')->middleware('auth', 'can:compras-index');
Route::post('/admin/compras/store', [App\Http\Controllers\CompraController::class, 'store'])->name('compras.store')->middleware('auth', 'can:compras-store');
Route::get('/admin/compras/{id}/edit', [App\Http\Controllers\CompraController::class, 'edit'])->name('compras.edit')->middleware('auth', 'can:compras-edit');
Route::get('/admin/compras/{id}/report', [App\Http\Controllers\PDFController::class, 'PdfOrdenCompra'])->name('compras.report')->middleware('auth', 'can:compras-report');
Route::get('/admin/compras/{id}/preview', [App\Http\Controllers\PDFController::class, 'previewOrdenCompra'])->name('compras.preview')->middleware('auth', 'can:compras-report');
Route::get('/admin/compras/{id}/download', [App\Http\Controllers\PDFController::class, 'downloadOrdenCompra'])->name('compras.download')->middleware('auth', 'can:compras-report'); 
Route::put('/admin/compras/{id}/restore', [App\Http\Controllers\CompraController::class, 'restore'])->name('compras.restore')->middleware('auth');
Route::put('/admin/compras/{id}', [App\Http\Controllers\CompraController::class, 'update'])->name('compras.update')->middleware('auth', 'can:compras-update');
Route::get('/admin/compras/{id}', [App\Http\Controllers\CompraController::class, 'show'])->name('compras.show')->middleware('auth', 'can:compras-show');
Route::delete('/admin/compras/{id}', [App\Http\Controllers\CompraController::class, 'destroy'])->name('compras.destroy')->middleware('auth');

//Rutas para detalles de compra para eliminar un detalle de compra específico
Route::delete('/admin/compras/detalle-compra/{id}', [App\Http\Controllers\DetalleCompraController::class, 'destroy'])->name('detalle-compra.destroy')->middleware('auth', 'can:compras-destroy');

//rutas para roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth', 'can:roles-index');
Route::post('/admin/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth', 'can:roles-store');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth', 'can:roles-destroy');
Route::get('/admin/roles/asignar/{id}', [App\Http\Controllers\RoleController::class, 'asignar'])->name('admin.roles.asignar')->middleware('auth', 'can:roles-asignar');
Route::put('/admin/roles/asignar/{id}', [App\Http\Controllers\RoleController::class, 'update_asignar'])->name('admin.roles.update_asignar')->middleware('auth', 'can:roles-update_asignar');

//rutas para proveedores 
Route::get('/admin/proveedores', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores.index')->middleware('auth', 'can:proveedores-index');
Route::get('/admin/proveedores/create', [App\Http\Controllers\ProveedorController::class, 'create'])->name('proveedores.create')->middleware('auth', 'can:proveedores-create');
Route::post('/admin/proveedores/store', [App\Http\Controllers\ProveedorController::class, 'store'])->name('proveedores.store')->middleware('auth', 'can:proveedores-store');
Route::get('/admin/proveedores/{id}/edit', [App\Http\Controllers\ProveedorController::class, 'edit'])->name('proveedores.edit')->middleware('auth', 'can:proveedores-edit');
Route::put('/admin/proveedores/{id}', [App\Http\Controllers\ProveedorController::class, 'update'])->name('proveedores.update')->middleware('auth', 'can:proveedores-update');
Route::get('/admin/proveedores/{id}', [App\Http\Controllers\ProveedorController::class, 'show'])->name('proveedores.show')->middleware('auth', 'can:proveedores-show');
Route::delete('/admin/proveedores/{id}', [App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedores.destroy')->middleware('auth', 'can:proveedores-destroy');
Route::put('/admin/proveedores/{id}/restore', [App\Http\Controllers\ProveedorController::class, 'restore'])->name('proveedores.restore')->middleware('auth', 'can:proveedores-restore');

//Rutas para usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios.index')->middleware('auth', 'can:usuarios-index');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('usuarios.show')->middleware('auth', 'can:usuarios-show');
Route::post('/admin/usuarios/store', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store')->middleware('auth', 'can:usuarios-store');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit')->middleware('auth', 'can:usuarios-edit');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update')->middleware('auth', 'can:usuarios-update');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth', 'can:usuarios-destroy');
Route::put('admin/usuarios/{id}/restore', [App\Http\Controllers\UserController::class, 'restore'])->name('usuarios.restore')->middleware('auth', 'can:usuarios-restore');

//rutas para categorias 
Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index')->middleware('auth', 'can:categorias-index');
Route::post('/admin/categorias/store', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store')->middleware('auth', 'can:categorias-store');
Route::delete('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categorias.destroy')->middleware('auth', 'can:categorias-destroy');
Route::put('admin/categorias/{id}/restore', [App\Http\Controllers\CategoriaController::class, 'restore'])->name('categorias.restore')->middleware('auth', 'can:categorias-restore');

// rutas para productos
Route::get('/admin/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index')->middleware('auth', 'can:productos-index');
Route::post('/admin/productos/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store')->middleware('auth', 'can:productos-store');
// ruta AJAX para listar productos
Route::get('/admin/productos/ajax/listar', [App\Http\Controllers\ProductoController::class, 'listarAjax'])->name('productos.ajax.listar');


// ESTA VA PRIMERO
Route::get('/admin/productos/{id}/data/{action?}', [App\Http\Controllers\ProductoController::class, 'data'])->name('productos.data')->middleware('auth', 'can:productos-data');

Route::put('/admin/productos/{id}/update', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update')->middleware('auth', 'can:productos-update');

// ESTA VA DESPUÉS
Route::get('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show')->middleware('auth', 'can:productos-show');

Route::delete('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy')->middleware('auth', 'can:productos-destroy');
Route::put('/admin/productos/{id}/restore', [App\Http\Controllers\ProductoController::class, 'restore'])->name('productos.restore')->middleware('auth', 'can:productos-restore');

// Ruta para OCR de facturas
Route::post('/admin/ocr/procesar-factura', [App\Http\Controllers\OcrController::class, 'procesarFactura'])->name('ocr.procesar-factura')->middleware('auth');

//rutas para combustibles
Route::get('/admin/combustibles', [App\Http\Controllers\CombustibleController::class, 'index'])->name('combustibles.index')->middleware('auth', 'can:combustibles-index');
Route::get('/admin/combustibles/create', [App\Http\Controllers\CombustibleController::class, 'create'])->name('combustibles.create')->middleware('auth', 'can:combustibles-create');
Route::post('/admin/combustibles/store', [App\Http\Controllers\CombustibleController::class, 'store'])->name('combustibles.store')->middleware('auth', 'can:combustibles-store');
Route::get('/admin/combustibles/{id}/edit', [App\Http\Controllers\CombustibleController::class, 'edit'])->name('combustibles.edit')->middleware('auth', 'can:combustibles-edit');
Route::get('/admin/combustibles/report/{id}', [App\Http\Controllers\PDFController::class, 'PdfOrdenCarga'])->name('combustibles.report')->middleware('auth', 'can:combustibles-report');
Route::get('/admin/combustibles/{id}/preview', [App\Http\Controllers\PDFController::class, 'previewOrdenCarga'])->name('combustibles.preview')->middleware('auth', 'can:combustibles-report');
Route::get('/admin/combustibles/{id}/download', [App\Http\Controllers\PDFController::class, 'downloadOrdenCarga'])->name('combustibles.download')->middleware('auth', 'can:combustibles-report');
Route::put('/admin/combustibles/{id}/restore', [App\Http\Controllers\CombustibleController::class, 'restore'])->name('combustibles.restore')->middleware('auth', 'can:combustibles-restore');
Route::post('/admin/combustibles/update-prices', [App\Http\Controllers\CombustibleController::class, 'updatePrices'])->name('combustibles.update-prices')->middleware('auth', 'can:combustibles-update-prices');
Route::put('/admin/combustibles/{id}', [App\Http\Controllers\CombustibleController::class, 'update'])->name('combustibles.update')->middleware('auth', 'can:combustibles-update');
Route::get('/admin/combustibles/{id}', [App\Http\Controllers\CombustibleController::class, 'show'])->name('combustibles.show')->middleware('auth', 'can:combustibles-show');
Route::delete('/admin/combustibles/{id}', [App\Http\Controllers\CombustibleController::class, 'destroy'])->name('combustibles.destroy')->middleware('auth', 'can:combustibles-destroy');

//rutas para vehiculos
Route::get('/admin/vehiculos', [App\Http\Controllers\VehiculoController::class, 'index'])->name('vehiculos.index')->middleware('auth', 'can:vehiculos-index');
Route::get('/admin/vehiculos/create', [App\Http\Controllers\VehiculoController::class, 'create'])->name('vehiculos.create')->middleware('auth', 'can:vehiculos-create');
Route::post('/admin/vehiculos/store', [App\Http\Controllers\VehiculoController::class, 'store'])->name('vehiculos.store')->middleware('auth', 'can:vehiculos-store');
Route::get('/admin/vehiculos/{id}/edit', [App\Http\Controllers\VehiculoController::class, 'edit'])->name('vehiculos.edit')->middleware('auth', 'can:vehiculos-edit');
Route::put('/admin/vehiculos/{id}', [App\Http\Controllers\VehiculoController::class, 'update'])->name('vehiculos.update')->middleware('auth', 'can:vehiculos-update');
Route::get('/admin/vehiculos/{id}', [App\Http\Controllers\VehiculoController::class, 'show'])->name('vehiculos.show')->middleware('auth', 'can:vehiculos-show');
Route::delete('/admin/vehiculos/{id}', [App\Http\Controllers\VehiculoController::class, 'destroy'])->name('vehiculos.destroy')->middleware('auth', 'can:vehiculos-destroy');
Route::put('admin/vehiculos/{id}/restore', [App\Http\Controllers\VehiculoController::class, 'restore'])->name('vehiculos.restore')->middleware('auth', 'can:vehiculos-restore');

//rutas para empleados
Route::get('/admin/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleados.index')->middleware('auth', 'can:empleados-index');
Route::get('/admin/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleados.create')->middleware('auth', 'can:empleados-create');
Route::post('/admin/empleados/store', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleados.store')->middleware('auth', 'can:empleados-store');
Route::get('/admin/empleados/{id}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('empleados.edit')->middleware('auth', 'can:empleados-edit');
Route::put('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleados.update')->middleware('auth', 'can:empleados-update');
Route::get('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('empleados.show')->middleware('auth', 'can:empleados-show');
Route::delete('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleados.destroy')->middleware('auth', 'can:empleados-destroy');
Route::put('admin/empleados/{id}/restore', [App\Http\Controllers\EmpleadoController::class, 'restore'])->name('empleados.restore')->middleware('auth', 'can:empleados-restore');

//rutas para obras
Route::get('/admin/obras', [App\Http\Controllers\ObraController::class, 'index'])->name('obras.index')->middleware('auth', 'can:obras-index');
Route::get('/admin/obras/create', [App\Http\Controllers\ObraController::class, 'create'])->name('obras.create')->middleware('auth', 'can:obras-create');
Route::post('/admin/obras/store', [App\Http\Controllers\ObraController::class, 'store'])->name('obras.store')->middleware('auth', 'can:obras-store');
Route::get('/admin/obras/{id}/edit', [App\Http\Controllers\ObraController::class, 'edit'])->name('obras.edit')->middleware('auth', 'can:obras-edit');
Route::put('/admin/obras/{id}', [App\Http\Controllers\ObraController::class, 'update'])->name('obras.update')->middleware('auth', 'can:obras-update');
Route::get('/admin/obras/{id}', [App\Http\Controllers\ObraController::class, 'show'])->name('obras.show')->middleware('auth', 'can:obras-show');
Route::delete('/admin/obras/{id}', [App\Http\Controllers\ObraController::class, 'destroy'])->name('obras.destroy')->middleware('auth', 'can:obras-destroy');
Route::put('admin/obras/{id}/restore', [App\Http\Controllers\ObraController::class, 'restore'])->name('obras.restore')->middleware('auth', 'can:obras-restore');

// Rutas para permisos 
Route::get('/admin/permisos', [App\Http\Controllers\PermisoController::class, 'index'])->name('permisos.index')->middleware('auth', 'can:permisos-index');
Route::post('/admin/permisos/store', [App\Http\Controllers\PermisoController::class, 'store'])->name('permisos.store')->middleware('auth', 'can:permisos-store');
Route::delete('/admin/permisos/{id}', [App\Http\Controllers\PermisoController::class, 'destroy'])->name('permisos.destroy')->middleware('auth', 'can:permisos-destroy');

//Rutas para movimientos
Route::get('/admin/movimientos', [App\Http\Controllers\MovimientoController::class, 'index'])->name('movimientos.index')->middleware('auth', 'can:movimientos-index');
Route::get('/admin/movimientos/create', [App\Http\Controllers\MovimientoController::class, 'create'])->name('movimientos.create')->middleware('auth', 'can:movimientos-create');
Route::post('/admin/movimientos/store', [App\Http\Controllers\MovimientoController::class, 'store'])->name('movimientos.store')->middleware('auth', 'can:movimientos-store');
Route::get('/admin/movimientos/{id}/edit', [App\Http\Controllers\MovimientoController::class, 'edit'])->name('movimientos.edit')->middleware('auth', 'can:movimientos-edit');
Route::put('/admin/movimientos/{id}', [App\Http\Controllers\MovimientoController::class, 'update'])->name('movimientos.update')->middleware('auth', 'can:movimientos-update');
Route::get('/admin/movimientos/{id}', [App\Http\Controllers\MovimientoController::class, 'show'])->name('movimientos.show')->middleware('auth', 'can:movimientos-show');
Route::delete('/admin/movimientos/{id}', [App\Http\Controllers\MovimientoController::class, 'destroy'])->name('movimientos.destroy')->middleware('auth', 'can:movimientos-destroy');
Route::put('admin/movimientos/{id}/restore', [App\Http\Controllers\MovimientoController::class, 'restore'])->name('movimientos.restore')->middleware('auth', 'can:movimientos-restore');

//Rutas para depositos
Route::get('/admin/depositos', [App\Http\Controllers\DepositoController::class, 'index'])->name('depositos.index')->middleware('auth', 'can:depositos-index');
Route::get('/admin/depositos/{id}', [App\Http\Controllers\DepositoController::class, 'show'])->name('depositos.show')->middleware('auth', 'can:depositos-show');

//Ajax para obtener productos segun el caso
Route::get('/admin/obras/{obra}/productos', [App\Http\Controllers\ObraController::class, 'productosAsignados'])->name('ajax.obras')->middleware('auth');
Route::get('/admin/vehiculos/{vehiculo}/productos', [App\Http\Controllers\VehiculoController::class, 'productos'])->name('ajax.vehiculos')->middleware('auth');
Route::get('/admin/depositos/{deposito}/productos', [App\Http\Controllers\ProductoController::class, 'productos'])->name('ajax.depositos')->middleware('auth');

// Rutas para Destinos 
Route::get('/admin/destinos', [App\Http\Controllers\DestinoController::class, 'index'])->name('destinos.index')->middleware('auth', 'can:destinos-index');
Route::post('/admin/destinos/store', [App\Http\Controllers\DestinoController::class, 'store'])->name('destinos.store')->middleware('auth', 'can:destinos-store');
Route::get('/admin/destinos/{destino}', [App\Http\Controllers\DestinoController::class, 'show'])->name('destinos.show')->middleware('auth', 'can:destinos-show');
Route::put('/admin/destinos/{destino}', [App\Http\Controllers\DestinoController::class, 'update'])->name('destinos.update')->middleware('auth', 'can:destinos-update');
Route::delete('/admin/destinos/{destino}', [App\Http\Controllers\DestinoController::class, 'destroy'])->name('destinos.destroy')->middleware('auth', 'can:destinos-destroy');
Route::put('/admin/destinos/{id}/restore', [App\Http\Controllers\DestinoController::class, 'restore'])->name('destinos.restore')->middleware('auth', 'can:destinos-restore');

/*
Route::get('/api/destinos/{tipo}', function ($tipo) {

    // Config de modelos y campos correctos
    $map = [
        'deposito' => ['model' => \App\Models\Deposito::class, 'campo' => 'nombre'],
        'obra'     => ['model' => \App\Models\Obra::class,     'campo' => 'nombre'],
        'vehiculo' => ['model' => \App\Models\Vehiculo::class, 'campo' => 'patente'],
        'equipo'   => ['model' => \App\Models\Equipo::class,   'campo' => 'equipamiento'],
    ];

    // Si no existe el tipo → devolver lista vacía (evita error 500)
    if (!isset($map[$tipo])) {
        return response()->json([]);
    }

    $modelo = $map[$tipo]['model'];
    $campo  = $map[$tipo]['campo'];

    // SELECT seguro, sin confundir columnas
    return $modelo::select('id', "$campo as nombre")->get();
});
*/
Route::get('/api/destinos/{tipo}', function ($tipo) {

    $map = [
        'deposito' => ['model' => \App\Models\Deposito::class, 'campo' => 'nombre'],
        'obra' => ['model' => \App\Models\Obra::class, 'campo' => 'nombre'],
        'vehiculo' => ['model' => \App\Models\Vehiculo::class, 'campo' => 'patente'],
        'equipo' => ['model' => \App\Models\Equipo::class, 'campo' => 'equipamiento'],
    ];

    if (!isset($map[$tipo])) {
        return response()->json([]);
    }

    $modelo = $map[$tipo]['model'];
    $campo = $map[$tipo]['campo'];

    $query = $modelo::select('id', "$campo as nombre");

    // Excluir inactivos SOLO en modelos que tienen estado
    if (in_array($tipo, ['obra', 'vehiculo', 'equipo'])) {
        $query->where('estado', '!=', 0);
    }

    // 🔎 Filtro SOLO para obras
    if ($tipo === 'obra') {
        $query->where('estado_obra', 'en_ejecucion');
    }

    return $query->get();
});


//Rutas para los selects de movimientos
Route::get('origen/listar/{tipo}', [App\Http\Controllers\OrigenController::class, 'listar'])->name('origen.listar');
Route::get('origen/{tipo}/{id}/productos', [App\Http\Controllers\OrigenController::class, 'productos'])->name('origen.productos');

//Rutas para equipos
Route::get('/admin/equipos', [App\Http\Controllers\EquipoController::class, 'index'])->name('equipos.index')->middleware('auth', 'can:equipos-index');
Route::get('/admin/equipos/create', [App\Http\Controllers\EquipoController::class, 'create'])->name('equipos.create')->middleware('auth', 'can:equipos-create');
Route::post('/admin/equipos/store', [App\Http\Controllers\EquipoController::class, 'store'])->name('equipos.store')->middleware('auth', 'can:equipos-store');
Route::get('/admin/equipos/{id}/edit', [App\Http\Controllers\EquipoController::class, 'edit'])->name('equipos.edit')->middleware('auth', 'can:equipos-edit');
Route::put('/admin/equipos/{id}', [App\Http\Controllers\EquipoController::class, 'update'])->name('equipos.update')->middleware('auth', 'can:equipos-update');
Route::get('/admin/equipos/{id}', [App\Http\Controllers\EquipoController::class, 'show'])->name('equipos.show')->middleware('auth', 'can:equipos-show');
Route::delete('/admin/equipos/{id}', [App\Http\Controllers\EquipoController::class, 'destroy'])->name('equipos.destroy')->middleware('auth', 'can:equipos-destroy');
Route::put('admin/equipos/{id}/restore', [App\Http\Controllers\EquipoController::class, 'restore'])->name('equipos.restore')->middleware('auth', 'can:equipos-restore');

//Rutas para auditoría
Route::get('/admin/auditoria', [App\Http\Controllers\AuditoriaController::class, 'index'])->name('auditoria.index')->middleware('auth', 'can:auditoria-index');
Route::get('/admin/auditoria/{id}', [App\Http\Controllers\AuditoriaController::class, 'show'])->name('auditoria.show')->middleware('auth', 'can:auditoria-show');

//Rutas para backups
Route::get('/admin/backups', [App\Http\Controllers\BackupController::class, 'index'])->name('backups.index')->middleware('auth', 'can:backups-index');
Route::post('/admin/backups/create', [App\Http\Controllers\BackupController::class, 'create'])->name('backups.create')->middleware('auth', 'can:backups-create');
Route::get('/admin/backups/download/{filename}', [App\Http\Controllers\BackupController::class, 'download'])->name('backups.download')->middleware('auth', 'can:backups-download');
Route::post('/admin/backups/verify/{filename}', [App\Http\Controllers\BackupController::class, 'verify'])->name('backups.verify')->middleware('auth', 'can:backups-verify');
Route::delete('/admin/backups/delete/{filename}', [App\Http\Controllers\BackupController::class, 'delete'])->name('backups.delete')->middleware('auth', 'can:backups-delete');


require __DIR__ . '/auth.php';
