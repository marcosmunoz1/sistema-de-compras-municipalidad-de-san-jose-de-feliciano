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
Route::put('admin/proveedores/{id}/restore', [App\Http\Controllers\ProveedorController::class, 'restore'])->name('proveedores.restore');

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

//rutas para productos 
Route::get('/admin/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
Route::get('/admin/productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
Route::post('/admin/productos/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');
Route::get('/admin/productos/{id}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
Route::get('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');
Route::delete('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('admin/productos/{id}/restore', [App\Http\Controllers\ProductoController::class, 'restore'])->name('productos.restore');

require __DIR__.'/auth.php';
