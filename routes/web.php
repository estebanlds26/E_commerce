<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
         $productos = Producto::all();   
         // Pasar los productos a la vista
         return view('welcome', compact('productos'));
})->name('home');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::resource('categorias', CategoriaController::class);
Route::resource('productos', ProductoController::class);


Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos/categoria/{categoria}', [ProductoController::class, 'filtrarPorCategoria'])->name('productos.filtrar');

Auth::routes();

