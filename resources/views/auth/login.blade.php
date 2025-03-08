<x-guest-layout>
    <div class="w-full bg-white p-6 rounded-lg shadow-xl">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <legend class="block font-extrabold text-xl text-[#1e355e] text-center uppercase">Iniciar sesión</legend>

            <!-- Email Address -->
            <div class="mt-5">
                <x-input-label for="email" value="Correo Electronico" />

                <x-text-input id="email" type="email" name="email" :value="old('email')" autofocus
                    autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-5">
                <x-input-label for="password" value="Contraseña" />

                <x-text-input id="password" type="password" name="password" autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 mb-5">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-[#1e355e]0 shadow-sm focus:ring-indigo-500 active:bg-violet-400"
                        name="remember">
                    <span class="ms-2 text-sm text-[#1e355e]">Recuérdame</span>
                </label>
            </div>

            <div class="flex items-center justify-end">
                <x-button type="submit" color="ito">
                    Iniciar Sesión
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>