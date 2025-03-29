@extends('layouts.app')
@section('content')
<a href="{{ route('productos.create') }}" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; text-decoration: none;" 
onmouseover="this.style.backgroundColor='#2980b9'" 
onmouseout="this.style.backgroundColor='#3498db'">Crear Nuevo Producto</a>
    <div class="container">
        <h1>Lista de Productos</h1>
        @if (isset($categoriaSeleccionada))
        <h2>Mostrando productos de la categoría: {{ $categoriaSeleccionada->nombre }}</h2>
        @endif
    
        @if ($productos->isEmpty())
            <p>No hay productos disponibles.</p>
        @else
            <div class="row">
                @foreach ($productos as $producto)
                            <div>
                                <h3>{{ $producto->nombre }}</h3>
                                <p>{{ $producto->descripcion }}</p>
                                <p>Precio: ${{ $producto->precio }}</p>
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" width="150">
                            @endif
                            <td>
                               <br> <br><a href="{{ route('productos.edit', $producto->id) }}" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;text-decoration: none;
                                    onmouseover="this.style.backgroundColor='#2980b9'" 
                            onmouseout="this.style.backgroundColor='#3498db'">Editar</a>
                            
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;text-decoration: none;
                                    onmouseover="this.style.backgroundColor='#2980b9'" 
                            onmouseout="this.style.backgroundColor='#3498db'" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                            
                            </div>
                @endforeach

            </div>
        @endif
    </div>
@endsection
