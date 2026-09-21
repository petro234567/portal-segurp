<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Mensaje del CMS</title>
</head>
<body>
 <h1>Nuevo mensaje</h1>
   <p><strong>Nombre:</strong> {{ $name }}</p>
    <p><strong>Correo:</strong> {{ $email }}</p>
    <h2>Mensaje</h2>
    <p>{{ $message }}</p>

 <form method="POST" action="{{ route('contact.store') }}">
    @csrf
    <label>Nombre
        <input type="text" name="name" value="{{ old('name') }}" required>
    </label>
    <label>Correo
        <input type="email" name="email" value="{{ old('email') }}" required>
    </label>
    <label>Mensaje
       <textarea name="message" rows="8" required>{{ old('message') }}</textarea>
    </label>
 <button type="submit">Enviar mensaje</button>
</form>

</body>
</html