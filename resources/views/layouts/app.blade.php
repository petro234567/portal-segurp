<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portal Seguro')</title>

    <!-- Bootstrap CSS (CDN) -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Tus estilos propios (encima de Bootstrap, para poder sobreescribir) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#006b3f;">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ route('home') }}">Portal Seguro</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navMenu" aria-controls="navMenu"
                        aria-expanded="false" aria-label="Alternar navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navMenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}"
                               href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active fw-semibold' : '' }}"
                               href="{{ route('about') }}">Acerca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active fw-semibold' : '' }}"
                               href="{{ route('contact') }}">Contacto</a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}"
                                   href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link p-0 border-0 text-white">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('login') ? 'active fw-semibold' : '' }}"
                                   href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        @if (session('status'))
            <div class="container mt-3">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-light text-center py-3 mt-auto border-top">
        <small class="text-muted">&copy; {{ date('Y') }} Portal Seguro — Universidad de Cundinamarca</small>
    </footer>

    <!-- Bootstrap JS (necesario para el menú responsive, dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>