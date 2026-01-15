<h1>Editar Pizza</h1>

@if ($errors -> any())
    <div style='color:red'>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('pizzas.update', $pizza->id) }}">
    @csrf <!--'@csrf'Impide o permite que haya un cruce de dominios, para que no se mande informacion de dominios distintos-->
    @method('PUT') <!--Indica que es una actualizacion de algo existente-->

    <input type="text" name="nombre" placeholder="Nombre" value="{{ $pizza->nombre }}"><br>

    <textarea name="descripcion">{{ $pizza->descripcion }}</textarea><br>

    <input type="number" step="0.01" name="precio" value="{{ $pizza->precio }}">

    <h3>Ingredientes</h3>
    @foreach($ingredientes as $ingrediente)
        <label>
            <input type="checkbox" name="ingredientes[]" value="{{ $ingrediente->id }}" {{ $pizza->ingredientes->contains($ingrediente->id) ? 'checked' : ''}}>
            {{ $ingrediente->nombre }}
        </label><br>
    @endforeach

    <button type="submit">Guardar cambios</button>
</form>
