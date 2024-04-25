<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Iniciar sesión
        </h2>
    </x-slot>

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-3/6 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-5">
                    <x-input-label for="email" value="Correo Electronico" />

                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        autofocus 
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <x-input-label for="password" value="Contraseña" />

                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full"
                        type="password"
                        name="password"
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Recuérdame</span>
                    </label>
                </div>

                <div class="flex items-center justify-end">
                    <x-button type="submit">
                        Iniciar Sesión
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>