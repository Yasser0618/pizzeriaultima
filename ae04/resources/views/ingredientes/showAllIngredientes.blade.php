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
        </tr>
        @endforeach
    </table>
@endsection