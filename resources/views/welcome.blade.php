@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido a Mi E-Commerce</h1>
    <p>Explora nuestra tienda y encuentra los mejores productos.</p>

    <div class="container mt-4">
        <h2>Productos Destacados</h2>
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ $producto->descripcion }}</p>
                            <p class="card-text"><strong>${{ $producto->precio }}</strong></p>
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection