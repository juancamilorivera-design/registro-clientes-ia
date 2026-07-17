@extends('layouts.app')

@section('content')

    <div class="mx-auto max-w-3xl">

        <div class="mb-6 flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-[#2A3F77]">
                    Detalle de la Solicitud
                </h2>

                <p class="text-gray-500">
                    Información registrada de la solicitud.
                </p>

            </div>

            <a
                href="{{ route('solicitudes.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2 text-gray-700 transition hover:bg-gray-100"
            >
                ← Volver
            </a>

        </div>

        <div class="rounded-xl bg-white p-8 shadow">

            <div class="mb-6 border-b pb-4">

                <p class="text-sm font-semibold text-gray-500">
                    Cliente
                </p>

                <p class="mt-1 text-lg font-medium text-[#2A3F77]">
                    {{ $solicitude->cliente->nombre_completo }}
                </p>

            </div>

            <div class="mb-6 border-b pb-4">

                <p class="text-sm font-semibold text-gray-500">
                    Servicio
                </p>

                <p class="mt-1 text-lg">
                    {{ $solicitude->servicio->nombre }}
                </p>

            </div>

            <div class="mb-6 border-b pb-4">

                <p class="text-sm font-semibold text-gray-500">
                    Estado
                </p>

                <div class="mt-2">

                    @if($solicitude->estado->nombre == 'Pendiente')

                        <span class="rounded-full bg-yellow-100 px-4 py-2 font-semibold text-yellow-700">
                        🟡 {{ $solicitude->estado->nombre }}
                    </span>

                    @elseif($solicitude->estado->nombre == 'En proceso')

                        <span class="rounded-full bg-blue-100 px-4 py-2 font-semibold text-blue-700">
                        🔵 {{ $solicitude->estado->nombre }}
                    </span>

                    @else

                        <span class="rounded-full bg-green-100 px-4 py-2 font-semibold text-green-700">
                        🟢 {{ $solicitude->estado->nombre }}
                    </span>

                    @endif

                </div>

            </div>

            <div class="mb-6 border-b pb-4">

                <p class="text-sm font-semibold text-gray-500">
                    País
                </p>

                <p class="mt-1 text-lg">
                    {{ $solicitude->cliente->pais }}
                </p>

            </div>

            <div class="mb-6 border-b pb-4">

                <p class="text-sm font-semibold text-gray-500">
                    Necesidad del Cliente
                </p>

                <div class="mt-2 rounded-lg bg-gray-50 p-4 leading-relaxed">
                    {{ $solicitude->necesidad }}
                </div>

            </div>

            <div>

                <p class="text-sm font-semibold text-gray-500">
                    Observaciones
                </p>

                <div class="mt-2 rounded-lg bg-gray-50 p-4 leading-relaxed">

                    {{ $solicitude->observaciones ?: 'Sin observaciones registradas.' }}

                </div>

            </div>

        </div>

        <div class="mt-6 flex gap-4">

            <a
                href="{{ route('solicitudes.edit', $solicitude->id) }}"
                class="rounded-lg bg-[#FFC107] px-6 py-3 font-semibold text-[#2A3F77] transition hover:bg-[#FFD54F]"
            >
                Editar Solicitud
            </a>

            <a
                href="{{ route('solicitudes.index') }}"
                class="rounded-lg bg-[#2A3F77] px-6 py-3 font-semibold text-white transition hover:bg-[#223462]"
            >
                Volver al listado
            </a>

        </div>

    </div>

@endsection
