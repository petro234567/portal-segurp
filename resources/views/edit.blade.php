    @csrf 
    @method('PATCH') 
    <!-- campos --> 
</form> 
 
<form method="POST" action="{{ route('posts.destroy', $post) }}"> 
    @csrf 
    @method('DELETE') 
    <button>Eliminar</button> 
</form>