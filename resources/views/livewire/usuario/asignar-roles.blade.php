<div>
    <div class="md:flex md:justify-center p-10">
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="actualizarRoles">
            @csrf
    
            <legend class="block font-bold text-lg text-gray-700 text-center">Asignar roles</legend>
    
            <div class="mt-5">
                <x-input-label for="rolesUsuario" value="Lista de roles" />
           
                @foreach ($roles as $rol)
                    <div class="flex items-center mt-2">
                        <input
                            type="checkbox"
                            id="rolesUsuario{{ $rol->id }}"
                            value="{{ $rol->id }}"
                            wire:model="rolesUsuario"
                            {{ in_array($rol->id, $usuario->roles->pluck('id')->toArray()) ? 'checked' : '' }}
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        >
                        <label for="rolesUsuario{{ $rol->id }}" class="ml-2 text-gray-700">{{ $rol->name }}</label>
                    </div>
                @endforeach
            
                <x-input-error :messages="$errors->get('rolesUsuario')" class="mt-2" />
            </div>    
    
            <div class="mt-5 text-center">
                <x-button type="submit">
                    Asignar roles
                </x-button>
            </div>
        </form>
        
    </div>
</div>
