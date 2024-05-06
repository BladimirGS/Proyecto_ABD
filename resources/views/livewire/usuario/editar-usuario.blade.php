<div>
    <div class="md:flex md:justify-center p-10">
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarUsuario">
            @csrf
    
            <legend class="block font-bold text-lg text-gray-700 text-center">Editar Usuario</legend>
    
            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" />
    
                <x-text-input
                    id="nombre"
                    type="text"
                    wire:model="nombre"
                    :value="$usuario->nombre"
                    placeholder="Nombre del usuario"
                />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>
    
            <div class="mt-5">
                <x-input-label for="apellido" value="Apellido" />
    
                <x-text-input
                    id="apellido"
                    type="text"
                    wire:model="apellido"
                    :value="$usuario->apellido"
                    placeholder="Apellido del usuario"
                />
                <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
            </div>
    
            <div class="mt-5">
                <x-input-label for="rfc" value="RFC" />
    
                <x-text-input
                    id="rfc"
                    type="text"
                    wire:model="rfc"
                    :value="$usuario->rfc"
                    placeholder="RFC del usuario"
                />
                <x-input-error :messages="$errors->get('rfc')" class="mt-2" />
            </div>
    
            <div class="mt-5">
                <x-input-label for="tipo" value="Tipo" />
    
                <select
                    id="tipo"
                    wire:model="tipo"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                >
                    <option disabled value="{{ $usuario->tipo }}">{{ $usuario->tipo}} </option>
                    <option value="Planta">Planta</option>
                    <option value="Honorario">Honorario</option>
                    <option value="Interino">Interino</option>
                    <option value="Administrador">Administrador</option>
                </select>
    
                <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
            </div>
    
            <div class="mt-5">
                <x-input-label for="email" value="Correo" />
    
                <x-text-input
                    id="email"
                    type="text"
                    wire:model="email"
                    :value="$usuario->email"
                    placeholder="Correo del usuario"
                    autocomplete="off"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <div class="mt-5">
                <x-input-label for="password" value="Contraseña" />
    
                <x-text-input
                    id="password"
                    type="password"
                    wire:model="password"
                    placeholder="Contraseña del usuario"
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <div class="mt-5 text-center">
                <x-button type="submit">
                    Actualizar Usuario
                </x-button>
            </div>
        </form>
    </div>
</div>
