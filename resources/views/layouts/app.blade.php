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

        <a href="{{ route('dashboard') }}" class="flex items-center">

            <img
                src="{{ asset('logo.png') }}"
                alt="Logo Colraíces"
                class="h-14 w-auto transition duration-200 hover:scale-105"
            >

        </a>

        <nav class="flex items-center gap-6 text-white">

            <a
                href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'font-semibold text-[#FFC107]' : 'transition hover:text-[#FFC107]' }}"
            >
                Dashboard
            </a>

            <a
                href="{{ route('clientes.index') }}"
                class="{{ request()->routeIs('clientes.*') ? 'font-semibold text-[#FFC107]' : 'transition hover:text-[#FFC107]' }}"
            >
                Clientes
            </a>

            <a
                href="{{ route('solicitudes.index') }}"
                class="{{ request()->routeIs('solicitudes.*') ? 'font-semibold text-[#FFC107]' : 'transition hover:text-[#FFC107]' }}"
            >
                Solicitudes
            </a>

            <div class="ml-8 flex items-center gap-5 border-l border-blue-300 pl-8">

                <span class="font-medium text-yellow-300">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-lg border border-red-300 px-3 py-2 text-sm transition hover:bg-red-600 hover:text-white"
                    >
                        Cerrar sesión
                    </button>

                </form>

            </div>

        </nav>

    </div>

</header>

<main class="mx-auto max-w-7xl p-8">

    @yield('content')

</main>

</body>

</html>
