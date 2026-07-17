@extends('layouts.app')

@section('content')

    <div class="space-y-6">

        <div class="rounded-xl bg-white p-6 shadow">

            <h2 class="text-3xl font-bold text-gray-800">
                Gestión de Solicitudes
            </h2>

            <p class="mt-2 text-gray-500">
                Administra las solicitudes registradas por los clientes.
            </p>

        </div>

        <div class="overflow-hidden rounded-xl bg-white shadow">

            <table class="min-w-full">

                <thead class="bg-slate-800 text-white">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Cliente
                    </th>

                    <th class="px-6 py-4 text-left">
                        Servicio
                    </th>

                    <th class="px-6 py-4 text-left">
                        Estado
                    </th>

                    <th class="px-6 py-4 text-left">
                        País
                    </th>

                    <th class="px-6 py-4 text-center">
                        Acciones
                    </th>

                </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">

                @foreach ($solicitudes as $solicitud)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $solicitud->cliente->nombre_completo }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $solicitud->servicio->nombre }}
                        </td>

                        <td class="px-6 py-4">

                            @if($solicitud->estado->nombre == 'Pendiente')

                                <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700">
                                🟡 {{ $solicitud->estado->nombre }}
                            </span>

                            @elseif($solicitud->estado->nombre == 'En proceso')

                                <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-700">
                                🔵 {{ $solicitud->estado->nombre }}
                            </span>

                            @else

                                <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">
                                🟢 {{ $solicitud->estado->nombre }}
                            </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">
                            {{ $solicitud->cliente->pais }}
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-3">

                                <a
                                    href="{{ route('solicitudes.show', $solicitud->id) }}"
                                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700"
                                >
                                    Ver
                                </a>

                                <a
                                    href="{{ route('solicitudes.edit', $solicitud->id) }}"
                                    class="rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-amber-600"
                                >
                                    Editar
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection
