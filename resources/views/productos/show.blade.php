@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $producto->nombre }}</h1>
        <p>{{ $producto->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
        <p><strong>Categoría:</strong> {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}</p>

        @if ($producto->imagen)
            <img src="{{ asset('storage/' . $producto->imagen) }}" width="200">
        @endif

        <br><br>
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver a productos</a>
    </div>
@endsection
