<div class="md:flex md:justify-center p-10">
    <form class="md:w-3/4 lg:w-2/3 space-y-5" wire:submit.prevent="CrearUsuario">
        @csrf

        <legend class="block font-medium text-lg text-gray-700 text-center">Registrar Usuario</legend>

        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
    
            <x-text-input
                id="nombre"
                class="block mt-1 w-full"
                type="text"
                wire:model="nombre"
                :value="old('nombre')"
                placeholder="Nombre del usuario"
            />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="apellido" :value="__('Apellido')" />
    
            <x-text-input
                id="apellido"
                class="block mt-1 w-full"
                type="text"
                wire:model="apellido"
                :value="old('apellido')"
                placeholder="Apellido del usuario"
            />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="rfc" :value="__('RFC')" />
    
            <x-text-input
                id="rfc"
                class="block mt-1 w-full"
                type="text"
                wire:model="rfc"
                :value="old('rfc')"
                placeholder="RFC del usuario"
            />
            <x-input-error :messages="$errors->get('rfc')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="tipo" :value="__('Tipo')" />
            <select
                id="tipo"
                wire:model="tipo"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            >
            <option>-- Seleccione --</option>
            <option value="planta">Planta</option>
                <option value="honorario">Honorario</option>
                <option value="administrador">Administrador</option>
            </select>
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="email" :value="__('Correo')" />
    
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="text"
                wire:model="email"
                :value="old('email')"
                placeholder="Correo del usuario"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    
        <div>
            <x-input-label for="password" :value="__('Contraseña')" />
    
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="text"
                wire:model="password"
                :value="old('password')"
                placeholder="Contraseña del usuario"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
    
        <div class="mt-5 text-center">
            <x-primary-button >
                {{ __('Registrar Usuario') }}
            </x-primary-button>
        </div>
    </form>
</div>