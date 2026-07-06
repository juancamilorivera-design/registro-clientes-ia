@extends('layouts.app')

@section('content')

    <div class="mx-auto max-w-2xl">

        <div class="mb-6">
            <h2 class="text-3xl font-bold text-[#2A3F77]">
                Editar Cliente
            </h2>

            <p class="text-gray-500">
                Modifica la información del cliente.
            </p>
        </div>

        <div class="rounded-xl bg-white p-8 shadow">

            <form action="{{ route('clientes.update', $cliente) }}" method="POST">

                @csrf
                @method('PUT')

                @include('clientes._form')

                <div class="mt-6 flex gap-4">

                    <button
                        type="submit"
                        class="rounded-lg bg-[#2A3F77] px-6 py-3 font-semibold text-white transition hover:bg-[#223462]"
                    >
                        Actualizar Cliente
                    </button>

                    <a
                        href="{{ route('clientes.index') }}"
                        class="rounded-lg border border-gray-300 px-6 py-3 text-gray-700 transition hover:bg-gray-100"
                    >
                        Cancelar
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
