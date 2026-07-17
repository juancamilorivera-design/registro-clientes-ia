@extends('layouts.app')

@section('content')

    <div class="space-y-6">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    Clientes
                </h2>

                <p class="mt-2 text-gray-500">
                    Gestión de clientes registrados.
                </p>
            </div>

            <a
                href="{{ route('clientes.create') }}"
                class="rounded-lg bg-yellow-400 px-6 py-3 font-semibold text-gray-900 shadow transition hover:bg-yellow-500"
            >
                + Nuevo Cliente
            </a>

        </div>

        <div class="overflow-hidden rounded-xl bg-white shadow">

            <table class="min-w-full">

                <thead class="bg-slate-800 text-white">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Nombre
                    </th>

                    <th class="px-6 py-4 text-left">
                        Acciones
                    </th>

                </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">

                @foreach ($clientes as $cliente)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $cliente->nombre_completo }}
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex gap-3">

                                <a
                                    href="{{ route('clientes.show', $cliente->id) }}"
                                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700"
                                >
                                    Ver
                                </a>

                                <a
                                    href="{{ route('clientes.edit', $cliente->id) }}"
                                    class="rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-amber-600"
                                >
                                    Editar
                                </a>

                                <form
                                    action="{{ route('clientes.destroy', $cliente->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('¿Desea eliminar este cliente?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700"
                                    >
                                        Eliminar
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection
