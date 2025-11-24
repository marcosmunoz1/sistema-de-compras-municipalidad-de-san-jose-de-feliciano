<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index'); 

Route::get('/admin/compras', function () {
    return view('admin.compras.index');
})->name('compras.index'); 

//rutas para roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index');
Route::post('/admin/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy');



//rutas para proveedores 
Route::get('/admin/proveedores', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/admin/proveedores/create', [App\Http\Controllers\ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/admin/proveedores/store', [App\Http\Controllers\ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/admin/proveedores/{id}/edit', [App\Http\Controllers\ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/admin/proveedores/{id}', [App\Http\Controllers\ProveedorController::class, 'update'])->name('proveedores.update');
Route::get('/admin/proveedores/{id}', [App\Http\Controllers\ProveedorController::class, 'show'])->name('proveedores.show');
Route::delete('/admin/proveedores/{id}', [App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedores.destroy');
Route::put('/admin/proveedores/{id}/restore', [App\Http\Controllers\ProveedorController::class, 'restore'])->name('proveedores.restore');

//Rutas para usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios.index');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('usuarios.show');
Route::post('/admin/usuarios/store', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('usuarios.destroy');
Route::put('admin/usuarios/{id}/restore', [App\Http\Controllers\UserController::class, 'restore'])->name('usuarios.restore');

//rutas para categorias 
Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/admin/categorias/store', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store');
Route::delete('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::put('admin/categorias/{id}/restore', [App\Http\Controllers\CategoriaController::class, 'restore'])->name('categorias.restore');

// rutas para productos
Route::get('/admin/productos', [ App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
Route::post('/admin/productos/store', [ App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');

// ESTA VA PRIMERO
Route::get('/admin/productos/{id}/data', [ App\Http\Controllers\ProductoController::class, 'data'])->name('productos.data');

Route::put('/admin/productos/{id}/update', [ App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');

// ESTA VA DESPUÉS
Route::get('/admin/productos/{id}', [ App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');

Route::delete('/admin/productos/{id}', [ App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/admin/productos/{id}/restore', [ App\Http\Controllers\ProductoController::class, 'restore'])->name('productos.restore');

//rutas para combustibles
Route::get('/admin/combustibles', [App\Http\Controllers\CombustibleController::class, 'index'])->name('combustibles.index');
Route::get('/admin/combustibles/create', [App\Http\Controllers\CombustibleController::class, 'create'])->name('combustibles.create');
Route::post('/admin/combustibles/store', [App\Http\Controllers\CombustibleController::class, 'store'])->name('combustibles.store');
Route::get('/admin/combustibles/{id}/edit', [App\Http\Controllers\CombustibleController::class, 'edit'])->name('combustibles.edit');
Route::put('/admin/combustibles/{id}', [App\Http\Controllers\CombustibleController::class, 'update'])->name('combustibles.update');
Route::get('/admin/combustibles/{id}', [App\Http\Controllers\CombustibleController::class, 'show'])->name('combustibles.show');
Route::delete('/admin/combustibles/{id}', [App\Http\Controllers\CombustibleController::class, 'destroy'])->name('combustibles.destroy');
Route::put('/admin/combustibles/{id}/restore', [App\Http\Controllers\CombustibleController::class, 'restore'])->name('combustibles.restore');
Route::post('/admin/combustibles/update-prices', [App\Http\Controllers\CombustibleController::class, 'updatePrices'])->name('combustibles.update-prices');
Route::get('/admin/combustibles/report/{id}', [App\Http\Controllers\PDFController::class, 'PdfOrdenCarga'])->name('combustibles.report'); 
//rutas para vehiculos
Route::get('/admin/vehiculos', [App\Http\Controllers\VehiculoController::class, 'index'])->name('vehiculos.index');
Route::get('/admin/vehiculos/create', [App\Http\Controllers\VehiculoController::class, 'create'])->name('vehiculos.create');
Route::post('/admin/vehiculos/store', [App\Http\Controllers\VehiculoController::class, 'store'])->name('vehiculos.store');
Route::get('/admin/vehiculos/{id}/edit', [App\Http\Controllers\VehiculoController::class, 'edit'])->name('vehiculos.edit');
Route::put('/admin/vehiculos/{id}', [App\Http\Controllers\VehiculoController::class, 'update'])->name('vehiculos.update');
Route::get('/admin/vehiculos/{id}', [App\Http\Controllers\VehiculoController::class, 'show'])->name('vehiculos.show');
Route::delete('/admin/vehiculos/{id}', [App\Http\Controllers\VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
Route::put('admin/vehiculos/{id}/restore', [App\Http\Controllers\VehiculoController::class, 'restore'])->name('vehiculos.restore'); 

//rutas para empleados
Route::get('/admin/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleados.index');
Route::get('/admin/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/admin/empleados/store', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/admin/empleados/{id}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleados.update');
Route::get('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('empleados.show');
Route::delete('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleados.destroy');
Route::put('admin/empleados/{id}/restore', [App\Http\Controllers\EmpleadoController::class, 'restore'])->name('empleados.restore');

require __DIR__.'/auth.php';
