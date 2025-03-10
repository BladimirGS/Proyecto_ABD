<div>
    <div class="md:flex md:justify-center p-10">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3">
            ✖
        </button>

        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarUsuario">
            @csrf

            <h2 class="block font-bold text-lg text-gray-700 text-center">Editar Usuario</h2>

            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" />

                <x-text-input id="nombre" type="text" wire:model="nombre" :value="$usuario->nombre"
                    placeholder="Nombre del usuario" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="apellido" value="Apellido" />

                <x-text-input id="apellido" type="text" wire:model="apellido" :value="$usuario->apellido"
                    placeholder="Apellido del usuario" />
                <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="rfc" value="RFC" />

                <x-text-input id="rfc" type="text" wire:model="rfc" :value="$usuario->rfc"
                    placeholder="RFC del usuario" />
                <x-input-error :messages="$errors->get('rfc')" class="mt-2" />
            </div>

            <div class="mt-5">
                <span class="block font-medium text-sm text-gray-700 cursor-default">Contrato</span>

                @foreach ($contratos as $contrato)
                <div class="flex items-center mt-2">
                    <label class="ml-2 text-gray-700">
                        <input type="checkbox" value="{{ $contrato->id }}" wire:model="contratosUsuario" {{
                            in_array($contrato->id, $contratosUsuario) ? 'checked' : '' }}
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        >
                        <span>{{ $contrato->nombre }}</span>
                    </label>
                </div>
                @endforeach

                <x-input-error :messages="$errors->get('contratosUsuario')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="email" value="Correo" />

                <x-text-input id="email" type="text" wire:model="email" :value="$usuario->email"
                    placeholder="Correo del usuario" autocomplete="off" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="password" value="Contraseña" />

                <x-text-input id="password" type="password" wire:model="password" placeholder="Contraseña del usuario"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                    Cancelar
                </x-button>

                <x-button type="submit" class="w-full md:w-auto">
                    Guardar cambio
                </x-button>
            </div>
        </form>
    </div>
</div>