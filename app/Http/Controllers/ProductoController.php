<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;


class ProductoController extends Controller
{
    public function index()
    {
         // Obtener todos los productos de la base de datos
         $productos = Producto::paginate(2);

         // Pasar los productos a la vista
         return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('productos.create', compact('categorias'));
    }
        
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id' => 'nullable|exists:categorias,id'
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
            'imagen' => $rutaImagen,
            'categoria_id' => $request->categoria_id
        ]);
        

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }
    
    public function edit(Producto $producto)
{
    $categorias = Categoria::all();
    return view('productos.edit', compact('producto'));
}

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id' => 'nullable|exists:categorias,id'
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
            'imagen' => $producto->imagen,
            'categoria_id' => $request->categoria_id
        ]);
        $producto->update($request->all());

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
    public function filtrarPorCategoria($categoria)
    {
        
        $productos = Producto::where('categoria_id', "=", $categoria)->paginate(10);
        $categorias = Categoria::all();
        $categoriaSeleccionada = Categoria::find($categoria);
    
        return view('productos.index', compact('productos', 'categorias', 'categoriaSeleccionada'));
    }
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
}