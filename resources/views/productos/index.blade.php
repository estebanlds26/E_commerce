@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Productos</h1>

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
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                            
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                            
                            </div>
                @endforeach

            </div>
        @endif
    </div>
@endsection
