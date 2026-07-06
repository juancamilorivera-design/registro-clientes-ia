<div class="mb-5">
    <label
        for="nombre_completo"
        class="mb-2 block text-sm font-semibold text-[#2A3F77]"
    >
        Nombre Completo
    </label>

    <input
        id="nombre_completo"
        type="text"
        name="nombre_completo"
        value="{{ old('nombre_completo', $cliente->nombre_completo ?? '') }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:border-[#2A3F77] focus:outline-none focus:ring-2 focus:ring-[#2A3F77]/20"
    >

    @error('nombre_completo')
    <p class="mt-2 text-sm text-red-600">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="mb-5">
    <label
        for="correo"
        class="mb-2 block text-sm font-semibold text-[#2A3F77]"
    >
        Correo
    </label>

    <input
        id="correo"
        type="email"
        name="correo"
        value="{{ old('correo', $cliente->correo ?? '') }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:border-[#2A3F77] focus:outline-none focus:ring-2 focus:ring-[#2A3F77]/20"
    >

    @error('correo')
    <p class="mt-2 text-sm text-red-600">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="mb-5">
    <label
        for="telefono"
        class="mb-2 block text-sm font-semibold text-[#2A3F77]"
    >
        Teléfono
    </label>

    <input
        id="telefono"
        type="text"
        name="telefono"
        value="{{ old('telefono', $cliente->telefono ?? '') }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:border-[#2A3F77] focus:outline-none focus:ring-2 focus:ring-[#2A3F77]/20"
    >

    @error('telefono')
    <p class="mt-2 text-sm text-red-600">
        {{ $message }}
    </p>
    @enderror
</div>

<div class="mb-5">
    <label
        for="pais"
        class="mb-2 block text-sm font-semibold text-[#2A3F77]"
    >
        País
    </label>

    <input
        id="pais"
        type="text"
        name="pais"
        value="{{ old('pais', $cliente->pais ?? '') }}"
        class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:border-[#2A3F77] focus:outline-none focus:ring-2 focus:ring-[#2A3F77]/20"
    >

    @error('pais')
    <p class="mt-2 text-sm text-red-600">
        {{ $message }}
    </p>
    @enderror
</div>
