<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/svg" href="{{ asset('svg/tecito.svg') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @stack('styles')
    </head>
    <body>
        <div class="flex flex-col min-h-screen">
            @include('layouts.header')

            <main class="flex-1 bg-gray-100">
                <div class="container mx-auto px-4 py-8">
                    {{ $slot }}
                </div>
            </main>
            
            @include('layouts.footer')
        </div>

        @livewireScripts
        @livewire('wire-elements-modal')
        @stack('scripts')
    </body>
</html>
