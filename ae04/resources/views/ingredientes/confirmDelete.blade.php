@extends('layouts.app')

@section('titulo')
Eliminar {{$ingrediente->nombre}}
@endsection

@section('contenido')
    <h1>Eliminar Ingrediente</h1>

    <p>
        ¿Estas seguro que quieres borrar el ingrediente <strong>{{$ingrediente->nombre}}</strong>?
    </p>

    <form action="{{ route('ingredientes.destroy', $ingrediente) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Si, eliminar</button>
        <a href="{{route('ingredientes.showAllIngredientes')}}">Cancelar</a>
    </form>
@endsection