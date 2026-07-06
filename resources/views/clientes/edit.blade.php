@extends('layouts.app')

@section('content')

    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label>Nombre Completo</label><br>

            <input
                type="text"
                name="nombre_completo"
                value="{{ old('nombre_completo', $cliente->nombre_completo) }}"
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
                value="{{ old('correo', $cliente->correo) }}"
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
                value="{{ old('telefono', $cliente->telefono) }}"
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
                value="{{ old('pais', $cliente->pais) }}"
            >

            @error('pais')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">
            Actualizar Cliente
        </button>

    </form>

@endsection
