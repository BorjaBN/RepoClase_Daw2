<a href="/bulos/{{ $bulo->id }}/edit" class="btn btn-xs btn-ghost">
    Editar
</a>

<form method="POST" action="/bulos/{{ $bulo->id }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-xs btn-ghost text-error"
        onclick="return confirm('¿Seguro que quieres borrar este bulo?')">
        Eliminar
    </button>
</form>
