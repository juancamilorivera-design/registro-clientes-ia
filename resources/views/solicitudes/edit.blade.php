@extends('layouts.app')

@section('content')

    <div class="mx-auto max-w-3xl">

        <div class="mb-6 flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-[#2A3F77]">
                    Editar Solicitud
                </h2>

                <p class="text-gray-500">
                    Actualiza el estado y las observaciones de la solicitud.
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

            <form action="{{ route('solicitudes.update', $solicitude->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-6">

                    <label class="mb-2 block text-sm font-semibold text-gray-600">
                        Cliente
                    </label>

                    <input
                        type="text"
                        value="{{ $solicitude->cliente->nombre_completo }}"
                        disabled
                        class="w-full rounded-lg border bg-gray-100 px-4 py-3"
                    >

                </div>

                <div class="mb-6">

                    <label class="mb-2 block text-sm font-semibold text-gray-600">
                        Servicio
                    </label>

                    <input
                        type="text"
                        value="{{ $solicitude->servicio->nombre }}"
                        disabled
                        class="w-full rounded-lg border bg-gray-100 px-4 py-3"
                    >

                </div>

                <div class="mb-6">

                    <label class="mb-2 block text-sm font-semibold text-gray-600">
                        Estado
                    </label>

                    <select
                        name="estado_id"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none"
                    >

                        @foreach ($estados as $estado)

                            <option
                                value="{{ $estado->id }}"
                                {{ $estado->id == $solicitude->estado_id ? 'selected' : '' }}
                            >
                                {{ $estado->nombre }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-8">

                    <label class="mb-2 block text-sm font-semibold text-gray-600">
                        Observaciones
                    </label>

                    <textarea
                        name="observaciones"
                        rows="6"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none"
                    >{{ old('observaciones', $solicitude->observaciones) }}</textarea>

                </div>

                <div class="flex gap-4">

                    <button
                        type="submit"
                        class="rounded-lg bg-[#2A3F77] px-6 py-3 font-semibold text-white transition hover:bg-[#223462]"
                    >
                        Guardar Cambios
                    </button>

                    <a
                        href="{{ route('solicitudes.show', $solicitude->id) }}"
                        class="rounded-lg bg-gray-200 px-6 py-3 font-semibold text-gray-700 transition hover:bg-gray-300"
                    >
                        Cancelar
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
