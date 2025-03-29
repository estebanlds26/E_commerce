<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
{
    public function index()
    {
         // Obtener todos los productos de la base de datos
         $productos = Producto::all();

         // Pasar los productos a la vista
         return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create'); // Muestra el formulario
    }
    
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Subir imagen si existe
        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
        }
    
        // Crear producto
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $rutaImagen
        ]);
    
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }
    
    public function edit(Producto $producto)
{
    return view('productos.edit', compact('producto'));
}

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Si hay nueva imagen, se guarda y se borra la anterior
        if ($request->hasFile('imagen')) {
            // Borrar la imagen anterior si existe
            if ($producto->imagen) {
                Storage::delete('public/' . $producto->imagen);
            }

            // Guardar la nueva imagen
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $rutaImagen;
        }

        // Actualizar los datos
        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $producto->imagen
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        // Borrar la imagen si existe
        if ($producto->imagen) {
            Storage::delete('public/' . $producto->imagen);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }

    }
