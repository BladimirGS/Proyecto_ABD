<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased text-gray-900 bg-gray-100">
        <div class="min-h-screen flex flex-col">
            <header class="header bg-white">
                @if (isset($header))
                    <div class="mx-auto">
                        {{ $header }}
                    </div>
                @endif  
            </header>


            <!-- Page Content -->
            <main class="flex-1 container mx-auto md:mt-28 mt-10">
                {{ $slot }}
            </main>

            <footer class="text-center p-5 text-gray-500 font-bold uppercase">
                Tecito - Todos los derechos reservados
                {{ now()->year }}
            </footer>
        </div>
    </body>
</html>
