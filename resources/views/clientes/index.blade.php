@extends('layouts.app')

@section('content')

    <h1>Lista de Clientes</h1>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @forelse ($clientes as $cliente)
        <p>{{ $cliente->nombre_completo }}</p>
    @empty
        <p>No hay clientes registrados.</p>
    @endforelse

@endsection
