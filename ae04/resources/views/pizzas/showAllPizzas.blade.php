@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

<table>
    <tr>
        <th>Pizza</th>
        <th>Precio</th>
        <th colspan="2">Acciones</th>
    </tr>
    @foreach ($pizzas as $pizza)
    <tr>
        <td><a href="{{route('pizzas.showOnePizza', $pizza->id)}}">{{$pizza->nombre}}</td>
        <td>{{$pizza->precio}}</td>
        <td><a href="{{route('pizzas.edit', $pizza->id)}}">Editar</td>
        <td><a href="{{route('pizzas.confirmDelete', $pizza->id)}}">Borrar</td>
    </tr>
    @endforeach
</table>
<button><a href="{{route('pizzas.create')}}">Crear Pizza</a></button>