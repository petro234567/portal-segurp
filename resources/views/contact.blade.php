<form method="POST" action="{{ route('contact.send') }}"> 
    @csrf 
 
    <label>Nombre</label> 
 
Especialización en Seguridad de la Información  |  14 / 23 
    <input name="name" value="{{ old('name') }}" required maxlength="100"> 
    @error('name') <p>{{ $message }}</p> @enderror 
 
    <label>Correo</label> 
    <input type="email" name="email" value="{{ old('email') }}" required> 
    @error('email') <p>{{ $message }}</p> @enderror 
 
    <label>Mensaje</label> 
    <textarea name="message" required maxlength="2000">{{ old('message') }}</textarea> 
    @error('message') <p>{{ $message }}</p> @enderror 
 
    <button type="submit">Enviar</button> 
</form> 