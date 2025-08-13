<div>
    <div class="md:flex md:justify-center p-10">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3">
            ✖
        </button>

        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="actualizarRoles">
            @csrf

            <h2 class="block font-bold text-lg text-gray-700 text-center uppercase">Asignar roles</h2>

            <div class="mt-5">
                <span class="block font-medium text-sm text-gray-700 cursor-default uppercase">Lista de roles</span>

                @foreach ($roles as $rol)
                <div class="flex items-center mt-2">
                    <label class="ml-2 text-gray-700">
                        <input type="checkbox" value="{{ $rol->id }}" wire:model="rolesUsuario" {{ in_array($rol->id,
                        $usuario->roles->pluck('id')->toArray()) ? 'checked' : '' }}
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        >
                        <span>{{ $rol->name }}</span>
                    </label>
                </div>
                @endforeach

                <x-input-error :messages="$errors->get('rolesUsuario')" class="mt-2" />
            </div>

            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                    Cancelar
                </x-button>

                <x-button type="submit" class="w-full md:w-auto">
                    Asignar roles
                </x-button>
            </div>
        </form>
    </div>
</div>