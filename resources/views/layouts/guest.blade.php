<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/svg" href="{{ asset('svg/tecito.svg') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @stack('styles')
    </head>
    <body>
        <div class="min-h-screen bg-gray-100 flex flex-col">
            @include('layouts.header-guest')

            <!-- Page Content -->
            <main class="flex-grow flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
                <div class="w-full max-w-md space-y-8">
                    {{ $slot }}
                </div>
            </main>

            @include('layouts.footer')
        </div>
    </body>
</html>
