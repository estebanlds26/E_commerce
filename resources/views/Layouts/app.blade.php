<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi E-Commerce')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('productos.index') }}">Productos</a></li>
                <li><a href="{{ route('categorias.index') }}">Categoria</a></li>
                @php $categorias = App\Models\Categoria::all(); @endphp
                @foreach ($categorias as $categoria)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.filtrar', $categoria->id) }}">{{ $categoria->nombre }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Mi E-Commerce</p>
    </footer>

</body>
</html>
