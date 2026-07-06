@extends('layouts.app')

@section('content')

    <h1>Lista de Clientes</h1>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @forelse ($clientes as $cliente)

        <hr>

        <p>
            <strong>{{ $cliente->nombre_completo }}</strong>
        </p>

        <a href="{{ route('clientes.show', $cliente->id) }}">
            Ver
        </a>

        |

        <a href="{{ route('clientes.edit', $cliente->id) }}">
            Editar
        </a>

    @empty

        <p>No hay clientes registrados.</p>

    @endforelse

@endsection
