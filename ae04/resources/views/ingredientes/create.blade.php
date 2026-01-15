@extends('layouts.app')

@section('titulo', 'Crear Ingrediente')

@section('contenido')
    <h1>Nuevo Ingrediente</h1>

    @if ($errors -> any())
        <div style='color:red'>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('ingredientes.store')}}">
        @csrf <!--'@csrf'Impide o permite que haya un cruce de dominios, para que no se mande informacion de dominios distintos-->

        <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}"><br>

        <button type="submit">Guardar</button>
    </form>
@endsection