<!DOCTYPE html> 
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard | SecureCMS</title>
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="cms-layout">
<header class="topbar">
<div><strong>SecureCMS</strong><span>Panel de administración</span></div>
<div>
<span>{{ auth()->user()->name }}</span>
<form method="POST" action="{{ route('logout') }}" style="display:inline">
@csrf
<button type="submit">Cerrar sesión</button>
</form>
</div>
</header>
<div class="cms-shell">
<aside class="sidebar">
<nav aria-label="Menú principal">
    <a href="{{ route('dashboard') }}">Dashboard</a>

    @can('manage-users')
        <a href="{{ route('users.index') }}">Usuarios</a>
    @endcan

    @can('manage-content')
        <a href="{{ route('pages.index') }}">Páginas</a>
    @endcan

    @can('manage-media')
        <a href="{{ route('media.index') }}">Galería</a>
    @endcan
</nav>
</aside>
<main class="cms-content">
<section class="welcome-card">
<span>Panel principal</span>
<h1>Bienvenido, {{ auth()->user()->name }}</h1>
<p>Administre los contenidos del CMS desde un entorno autenticado y controlado.</p>
</section>
<section class="stats-grid">
<article><span>Usuarios</span><strong>0</strong><small>Registros activos</small></article>
<article><span>Noticias</span><strong>0</strong><small>Publicaciones</small></article>
<article><span>Servicios</span><strong>0</strong><small>Servicios publicados</small></article>
<article><span>Imágenes</span><strong>0</strong><small>Recursos multimedia</small></article>
</section>
<section class="dashboard-grid">
<article><h2>Actividad reciente</h2><p>Eventos relevantes del sistema.</p></article>
<article><h2>Estado de seguridad</h2>
<ul><li>Autenticación activa</li><li>Sesión protegida</li>
<li>Rutas privadas protegidas</li><li>Controles pendientes: revisar</li></ul></article>
</section>
</main>
</div>
</body>
</html>