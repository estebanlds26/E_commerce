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
                @guest
                <li><a href="{{ route('register') }}">Registrarse</a></li>
                <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                @endguest
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('productos.index') }}">Productos</a></li>
                <li><a href="{{ route('categorias.index') }}">Categoria</a></li>
                @php $categorias = App\Models\Categoria::all(); @endphp
                @foreach ($categorias as $categoria)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.filtrar', $categoria->id) }}">{{ $categoria->nombre }}</a>
                    </li>
                @endforeach
                @auth
                <li>
                    <a href="#" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    Cerrar sesión                
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endauth
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
