<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--=============== BOXICONS ===============-->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @stack('styles')
    </head>
    <body class="antialiased body-pd text-gray-900 bg-gray-100" id="body-pd">
        <div class="min-h-screen flex flex-col">
            <header class="header body-pd bg-white" id="header">
                @auth
                    <div class="header__toggle">
                        <i class="bx bx-menu p-2 sm:pr-8" id="header-toggle"></i>
                    </div>
                    
                    <div class="l-navbar show  bg-violet-700" id="nav-bar">
                        @include('layouts.menu')
                    </div>
                @endauth

                @if (isset($header))
                    <div class="flex-1 w-52 sm:w-full">
                        {{ $header }}
                    </div>
                @endif
                
                @auth
                    <div class="header__toggle">
                        @include('layouts.navigation')
                    </div>
                @endauth
                
            </header>


            <!-- Page Content -->
            <main class="flex-1 container mx-auto md:mt-28 mt-10">
                {{ $slot }}
            </main>

            <footer class="text-center p-5 text-gray-500 font-bold uppercase">
                PruebaDev - Todos los derechos reservados
                {{ now()->year }}
            </footer>
        </div>

        @livewireScripts
        @livewire('wire-elements-modal')
        @stack('scripts')
    </body>
</html>
