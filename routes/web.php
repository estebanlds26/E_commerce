<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::resource('categorias', CategoriaController::class);
Route::get('/productos/categoria/{categoria_id}', [ProductoController::class, 'filtrarPorCategoria'])->name('productos.filtrar');
Route::get('/productos/filtrar', [ProductoController::class, 'filtrarPorCategoria'])->name('productos.filtrar');
Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
