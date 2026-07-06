@extends('layouts.app')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-3xl font-bold text-[#2A3F77]">
                Clientes
            </h2>

            <p class="text-gray-500">
                Gestión de clientes registrados.
            </p>
        </div>

        <a
            href="{{ route('clientes.create') }}"
            class="rounded-lg bg-[#FFC107] px-5 py-3 font-semibold text-[#2A3F77] transition hover:bg-yellow-400"
        >
            + Nuevo Cliente
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-xl bg-white shadow">

        <table class="min-w-full">

            <thead class="bg-[#2A3F77] text-white">

            <tr>
                <th class="px-6 py-4 text-left">Nombre</th>
                <th class="px-6 py-4 text-left">Acciones</th>
            </tr>

            </thead>

            <tbody>

            @forelse($clientes as $cliente)

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-6 py-4">
                        {{ $cliente->nombre_completo }}
                    </td>

                    <td class="px-6 py-4">

                        <div class="flex gap-3">

                            <a
                                href="{{ route('clientes.show', $cliente->id) }}"
                                class="text-blue-600 hover:underline"
                            >
                                Ver
                            </a>

                            <a
                                href="{{ route('clientes.edit', $cliente->id) }}"
                                class="text-yellow-600 hover:underline"
                            >
                                Editar
                            </a>

                            <form
                                action="{{ route('clientes.destroy', $cliente->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('¿Deseas eliminar este cliente?')"
                                >
                                    Eliminar
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="2"
                        class="px-6 py-8 text-center text-gray-500"
                    >
                        No hay clientes registrados.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

@endsection
