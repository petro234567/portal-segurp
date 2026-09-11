@extends('layouts.app')
@section('title', 'Contacto')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="contact-card">
                <span class="contact-badge">Portal Seguro</span>
                <h1 class="contact-title">Contacto</h1>
                <p class="contact-lead">Formulario protegido y validado en el servidor.</p>

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="contact-form">
                    @csrf

                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="name" value="{{ old('name') }}" required maxlength="100">
                        @error('name') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label>Mensaje</label>
                        <textarea name="message" required maxlength="2000">{{ old('message') }}</textarea>
                        @error('message') <p class="field-error">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="button-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection