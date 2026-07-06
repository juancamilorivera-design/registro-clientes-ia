@extends('layouts.app')

@section('content')

    <h1>Registrar Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">

        @csrf

        <div>
            <label>Nombre Completo</label><br>

            <input
                type="text"
                name="nombre_completo"
                value="{{ old('nombre_completo') }}"
            >

            @error('nombre_completo')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Correo</label><br>

            <input
                type="email"
                name="correo"
                value="{{ old('correo') }}"
            >

            @error('correo')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Teléfono</label><br>

            <input
                type="text"
                name="telefono"
                value="{{ old('telefono') }}"
            >

            @error('telefono')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>País</label><br>

            <input
                type="text"
                name="pais"
                value="{{ old('pais') }}"
            >

            @error('pais')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">
            Guardar Cliente
        </button>

    </form>

@endsection
