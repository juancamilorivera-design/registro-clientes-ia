@extends('layouts.app')

@section('content')

    <div class="mx-auto max-w-2xl">

        <div class="mb-6 flex items-center justify-between">

            <div>
                <h2 class="text-3xl font-bold text-[#2A3F77]">
                    Detalle del Cliente
                </h2>

                <p class="text-gray-500">
                    Información registrada del cliente.
                </p>
            </div>

            <a
                href="{{ route('clientes.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2 text-gray-700 transition hover:bg-gray-100"
            >
                ← Volver
            </a>

        </div>

        <div class="rounded-xl bg-white p-8 shadow">

            <div class="mb-6 border-b pb-4">
                <p class="text-sm font-semibold text-gray-500">
                    Nombre Completo
                </p>

                <p class="mt-1 text-lg font-medium text-[#2A3F77]">
                    {{ $cliente->nombre_completo }}
                </p>
            </div>

            <div class="mb-6 border-b pb-4">
                <p class="text-sm font-semibold text-gray-500">
                    Correo Electrónico
                </p>

                <p class="mt-1 text-lg">
                    {{ $cliente->correo }}
                </p>
            </div>

            <div class="mb-6 border-b pb-4">
                <p class="text-sm font-semibold text-gray-500">
                    Teléfono
                </p>

                <p class="mt-1 text-lg">
                    {{ $cliente->telefono }}
                </p>
            </div>

            <div>
                <p class="text-sm font-semibold text-gray-500">
                    País
                </p>

                <p class="mt-1 text-lg">
                    {{ $cliente->pais }}
                </p>
            </div>

        </div>

        <div class="mt-6 flex gap-4">

            <a
                href="{{ route('clientes.edit', $cliente) }}"
                class="rounded-lg bg-[#FFC107] px-6 py-3 font-semibold text-[#2A3F77] transition hover:bg-[#FFD54F]"
            >
                Editar Cliente
            </a>

            <a
                href="{{ route('clientes.index') }}"
                class="rounded-lg bg-[#2A3F77] px-6 py-3 font-semibold text-white transition hover:bg-[#223462]"
            >
                Volver al listado
            </a>

        </div>

    </div>

@endsection
