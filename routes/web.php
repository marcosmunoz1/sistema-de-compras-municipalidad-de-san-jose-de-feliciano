<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/compras', function () {
    return view('admin.compras.index');
})->name('compras.index'); 
