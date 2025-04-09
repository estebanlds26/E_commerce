@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido a Mi E-Commerce</h1>
    <p>Explora nuestra tienda y encuentra los mejores productos.</p>

    <section class="productos-destacados">
        <h2>Productos Destacados</h2>
        <p>VER PRODUCTOS DESTACADOS:</p>
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
                        
                        </div>
            @endforeach

        </div>
    @endif
    </section>
@endsection