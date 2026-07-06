@extends('layouts.app')

@section('content')

    <h1>Registrar Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">

        @csrf

        @include('clientes._form')

        <button type="submit">
            Guardar Cliente
        </button>

    </form>

@endsection
