@extends('layouts.app')

@section('content')

    <h1>Detalle del Cliente</h1>

    <p><strong>ID:</strong> {{ $cliente->id }}</p>

    <p><strong>Nombre Completo:</strong> {{ $cliente->nombre_completo }}</p>

    <p><strong>Correo:</strong> {{ $cliente->correo }}</p>

    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>

    <p><strong>País:</strong> {{ $cliente->pais }}</p>

    <br>

    <a href="{{ route('clientes.index') }}">
        ← Volver al listado
    </a>

@endsection
