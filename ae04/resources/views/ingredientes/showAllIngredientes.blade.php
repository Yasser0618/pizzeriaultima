@extends('layouts.app')

@section('titulo', 'Listado Ingredientes')

@section('contenido')
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table>
        <tr>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
        </tr>
        @foreach ($ingredientes as $ingrediente)
        <tr>
            <td>{{$ingrediente->nombre}}</td>
            <td><a href="{{ route('ingredientes.edit', $ingrediente->id) }}">Editar</a></td>
            <td><a href="{{ route('ingredientes.confirmDelete', $ingrediente->id) }}">Borrar</a></td>
        </tr>
        @endforeach
    </table>
@endsection