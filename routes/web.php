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

Route::get('/admin/usuarios', [\App\Http\Controllers\UserController::class, 'index'])->name('usuarios.index'); 

require __DIR__.'/auth.php';
