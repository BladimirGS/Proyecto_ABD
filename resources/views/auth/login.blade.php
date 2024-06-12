<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Iniciar sesión
        </h2>
    </x-slot>

    <div class="w-full lg:flex lg:justify-start md:gap-10 lg:items-center py-12">
        <div class="w-full lg:w-3/6 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
        </div>

        <div class="w-full lg:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <legend class="block font-extrabold text-xl text-violet-600 text-center uppercase">Bienvenido</legend>

                <!-- Email Address -->
                <div class="mt-5">
                    <x-input-label for="email" value="Correo Electronico" />

                    <x-text-input 
                        id="email" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        autofocus 
                        autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <x-input-label for="password" value="Contraseña" />

                    <x-text-input 
                        id="password" 
                        type="password"
                        name="password"
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4 mb-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-violet-600 shadow-sm focus:ring-indigo-500 active:bg-violet-400" name="remember">
                        <span class="ms-2 text-sm text-violet-600">Recuérdame</span>
                    </label>
                </div>

                <div class="flex items-center justify-end">
                    <x-button type="submit" color="violet">
                        Iniciar Sesión
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>