<div class="md:flex md:justify-center p-10">
    <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarUsuario"> 
        @csrf

        <legend class="block font-medium text-lg text-gray-700 text-center">Editar Usuario</legend>

        <div class="mt-5">
            <x-input-label for="nombre" :value="__('Nombre')" />
    
            <x-text-input 
                id="nombre" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="nombre" 
                :value="$usuario->nombre" 
                placeholder="Nombre del usuario"
            />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
    
        <div class="mt-5">
            <x-input-label for="apellido" :value="__('Apellido')" />
    
            <x-text-input 
                id="apellido" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="apellido" 
                :value="$usuario->apellido" 
                placeholder="Apellido del usuario"
            />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>
    
        <div class="mt-5">
            <x-input-label for="rfc" :value="__('RFC')" />
    
            <x-text-input 
                id="rfc" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="rfc" 
                :value="$usuario->rfc" 
                placeholder="RFC del usuario"
            />
            <x-input-error :messages="$errors->get('rfc')" class="mt-2" />
        </div>
    
        <div class="mt-5">
            <x-input-label for="tipo" :value="__('Tipo')" />
            <select 
                id="tipo" 
                wire:model="tipo" 
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            >
            <option value="{{ $usuario->tipo }}">{{ $usuario->tipo}} </option>
            <option value="planta">Planta</option>
            <option value="honorario">Honorario</option>
            <option value="administrador">Administrador</option>
            </select>
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />    
        </div>
    
        <div class="mt-5">
            <x-input-label for="email" :value="__('Correo')" />
    
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="email" 
                :value="$usuario->email" 
                placeholder="Correo del usuario"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    
        <div class="mt-5">
            <x-input-label for="password" :value="__('Contraseña')" />
    
            <x-text-input 
                id="password" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="password"
                placeholder="Contraseña del usuario"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
    
        <div class="mt-5 text-center">
            <x-primary-button>
                {{ __('Actualizar Usuario') }}
            </x-primary-button>
        </div>
        
        
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('usuarioActualizado', function () {
                Livewire.emit('actualizarUsuarios'); // Emitir evento Livewire
            });
        });
    </script>
    
</div>
