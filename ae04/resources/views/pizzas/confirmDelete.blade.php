<h1>Eliminar Pizza</h1>

<p>
    ¿Estas seguro que quieres borrar la piza?
    <strong>{{ $pizza->nombre }}</strong>
</p>

<form method="POST" action="{{ route('pizzas.destroy', $pizza) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Sí, eliminar</button>
    <a href="{{ route('pizzas.showAllPizzas') }}">Cancelar</a>
</form>