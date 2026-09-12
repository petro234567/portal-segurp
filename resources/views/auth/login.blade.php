<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | SecureApp</title>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>
<body>
<main class="login-page">
    <section class="login-card">
        <div class="login-header">
            <p class="login-badge">SecureApp</p>
            <h1>Iniciar sesión</h1>
            <p>Acceda utilizando sus credenciales institucionales.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-error" role="alert">
                <strong>No fue posible iniciar sesión.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email"
                       value="{{ old('email') }}"
                       autocomplete="username" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <div class="password-wrapper">
                    <input id="password" type="password" name="password"
                           autocomplete="current-password" required>
                    <button id="togglePassword" type="button"
                            class="password-toggle"
                            aria-label="Mostrar contraseña">Mostrar</button>
                </div>
            </div>

            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Recordarme
            </label>

            <button type="submit" class="button-primary">Ingresar</button>
        </form>

        <p class="login-back">
            <a href="{{ route('home') }}">&larr; Volver al inicio</a>
        </p>
    </section>
</main>
</body>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear cuenta | SecureCMS</title>
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="auth-page">
<main class="auth-card">
<header class="auth-header">
<span>SecureCMS</span>
<h1>Crear cuenta</h1>
<p>Registre sus datos para acceder a la plataforma.</p>
</header>
@if ($errors->any())
<div class="alert alert-error" role="alert">
<strong>Revise la información.</strong>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form method="POST" action="{{ route('register.store') }}">
@csrf
<label for="name">Nombre completo</label>
<input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required>
<label for="email">Correo electrónico</label>
<input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
<label for="password">Contraseña</label>
<input id="password" type="password" name="password" autocomplete="new-password" required>
<label for="password_confirmation">Confirmar contraseña</label>
<input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
<button type="submit">Crear cuenta</button>
</form>
<p>¿Ya tiene una cuenta? <a href="{{ route('login') }}">Iniciar sesión</a></p>
</main>
</body>
</html