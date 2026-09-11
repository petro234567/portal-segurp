@extends('layouts.app')
@section('title', 'Acerca')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="mb-3">Acerca del proyecto</h1>
            <p class="lead text-muted">
                Este sitio aplica prácticas de desarrollo seguro desde el primer commit.
            </p>
            <ul class="list-group list-group-flush mt-4">
                <li class="list-group-item">Secretos fuera del código fuente (<code>.env</code>)</li>
                <li class="list-group-item">Middleware de autenticación en rutas privadas</li>
                <li class="list-group-item">Escape automático de salida en Blade</li>
                <li class="list-group-item">Limitación de peticiones (<code>throttle</code>)</li>
            </ul>
        </div>
    </div>
</div>
@endsection