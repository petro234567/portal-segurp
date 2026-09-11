@extends('layouts.app') 
@section('title', 'Acerca') 
@section('content') 
    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="about-card">
                <span class="about-badge">Portal Seguro</span>
                <h1 class="about-title">Acerca del proyecto</h1>
                <p class="about-lead">
                    Este sitio aplica prácticas de desarrollo seguro desde el primer commit.
                </p>

                <ul class="about-list">
                    <li>
                        <span class="about-icon">🔒</span>
                        <div>
                            <strong>Secretos fuera del código fuente</strong>
                            <span class="text-muted">(<code>.env</code>)</span>
                        </div>
                    </li>
                    <li>
                        <span class="about-icon">🛡️</span>
                        <div>
                            <strong>Middleware de autenticación</strong> en rutas privadas
                        </div>
                    </li>
                    <li>
                        <span class="about-icon">🧹</span>
                        <div>
                            <strong>Escape automático de salida</strong> en Blade
                        </div>
                    </li>
                    <li>
                        <span class="about-icon">⏱️</span>
                        <div>
                            <strong>Limitación de peticiones</strong>
                            <span class="text-muted">(<code>throttle</code>)</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection 