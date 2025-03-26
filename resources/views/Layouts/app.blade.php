<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('inicio') }}">Mi Tienda</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                </li>
                
                <!-- Mostrar categorías en la barra de navegación -->
                @php $categorias = App\Models\Categoria::all(); @endphp
                @foreach ($categorias as $categoria)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.filtrar', ['categoria_id' => $categoria->id]) }}">{{ $categoria->nombre }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
