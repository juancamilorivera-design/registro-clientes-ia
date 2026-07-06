<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Clientes IA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F8F9FA]">

<header class="bg-[#2A3F77] shadow-md">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <div>
            <h1 class="text-2xl font-bold text-white">
                COLRAÍCES
            </h1>

            <p class="text-sm text-yellow-300">
                Registro de Clientes IA
            </p>
        </div>

        <nav class="flex gap-6 text-white">

            <a
                href="{{ route('clientes.index') }}"
                class="{{ request()->routeIs('clientes.index') || request()->routeIs('clientes.show') || request()->routeIs('clientes.edit') ? 'font-semibold text-[#FFC107]' : 'transition hover:text-[#FFC107]' }}"
            >
                Clientes
            </a>

            <a
                href="{{ route('clientes.create') }}"
                class="{{ request()->routeIs('clientes.create') ? 'font-semibold text-[#FFC107]' : 'transition hover:text-[#FFC107]' }}"
            >
                Registrar
            </a>

        </nav>

    </div>
</header>

<main class="mx-auto max-w-7xl p-8">

    @yield('content')

</main>

</body>

</html>
