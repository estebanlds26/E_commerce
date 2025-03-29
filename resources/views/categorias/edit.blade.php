@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
            <br>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection
