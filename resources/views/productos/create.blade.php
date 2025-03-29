@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Producto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del Producto</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>

        <button type="submit" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;text-decoration: none;
         onmouseover="this.style.backgroundColor='#2980b9'" 
         onmouseout="this.style.backgroundColor='#3498db'">Guardar Producto</button>
        <label for="categoria">Categoría:</label>
        <select name="categoria_id" id="categoria" class="form-control">
            <option value="">Selecciona una categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                    {{ old('categoria_id', isset($producto) ? $producto->categoria_id : '') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        
    </form>
</div>
@endsection
