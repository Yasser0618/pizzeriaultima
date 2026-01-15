<h1>Nueva Pizza</h1>

@if ($errors -> any())
    <div style='color:red'>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('pizzas.store')}}">
    @csrf <!--'@csrf'Impide o permite que haya un cruce de dominios, para que no se mande informacion de dominios distintos-->

    <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}"><br>

    <textarea name="descripcion">{{ old('descripcion') }}</textarea><br>

    <input type="number" step="0.01" name="precio" value="{{ old('precio') }}">

    <h3>Ingredientes</h3>
    @foreach($ingredientes as $ingrediente)
        <label>
            <input type="checkbox" id="{{ $ingrediente->nombre }}" name="ingredientes[]" value="{{ $ingrediente->id }}" {{ in_array($ingrediente->id, old('ingredientes', [])) ? 'checked' : ''}}>
            {{ $ingrediente->nombre }}
        </label><br>
    @endforeach

    <button type="submit">Guardar</button>
</form>