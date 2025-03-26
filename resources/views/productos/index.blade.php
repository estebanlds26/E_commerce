@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('productos.filtrar') }}" method="GET">
            <label for="categoria">Filtrar por Categoría:</label>
            <select name="categoria_id" id="categoria" onchange="this.form.submit()">
                <option value="">Todas</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </form>        
        <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">Crear Nuevo Producto</a>

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
                        <p><strong>Categoría:</strong> {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}</p>
                        
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" width="150">
                        @endif
                        <br>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver detalles</a> 
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
                <div class="d-flex justify-content-center">
                    {{ $productos->links() }}
                </div>                
            </div>
        @endif
    </div>
@endsection
