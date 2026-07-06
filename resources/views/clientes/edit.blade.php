@extends('layouts.app')

@section('content')

    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">

        @csrf
        @method('PUT')

        @include('clientes._form')

        <button type="submit">
            Actualizar Cliente
        </button>

    </form>

@endsection
