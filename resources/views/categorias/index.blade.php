@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categorías</h1>
        <a href="{{ route('categorias.create') }}" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;text-decoration: none;
                onmouseover="this.style.backgroundColor='#2980b9'" 
        onmouseout="this.style.backgroundColor='#3498db'"">Crear Nueva Categoría</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul class="list-group">
            @foreach ($categorias as $categoria)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $categoria->nombre }}
                    <div>
                       <br> <a href="{{ route('categorias.edit', $categoria->id) }}" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;text-decoration: none;
                onmouseover="this.style.backgroundColor='#2980b9'" 
        onmouseout="this.style.backgroundColor='#3498db'">Editar</a><br>

                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <br><button type="submit" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;text-decoration: none;
                            onmouseover="this.style.backgroundColor='#2980b9'" 
                    onmouseout="this.style.backgroundColor='#3498db'" onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
