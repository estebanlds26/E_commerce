@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Categoría</h1>

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection
