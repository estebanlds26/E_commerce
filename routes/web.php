<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

