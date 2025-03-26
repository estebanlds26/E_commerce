<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::latest()->take(6)->get(); // Últimos 6 productos
        return view('welcome', compact('productos'));
    }
}
