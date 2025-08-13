<div>
    <div class="bg-white mx-auto max-w-2xl p-8 rounded-lg shadow-lg relative">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <h2 class="block font-bold text-lg text-gray-700 text-center uppercase">Detalles del rol</h2>

        <div class="mt-5">
            <x-input-label value="Nombre" class="uppercase" />
            <p class="text-gray-800 border border-gray-300 rounded-md p-2">{{ $role->name }}</p>
        </div>
        
        <div class="mt-5">
            <x-input-label value="Descripción" class="uppercase" />
            <p class="text-gray-800 border border-gray-300 rounded-md p-2">{{ $role->description }}</p>
        </div>

        <div class="mt-5">
            <h2 class="block font-medium text-sm text-gray-700 uppercase">Lista de permisos</h2>
            
            @if ($role->permissions->isEmpty())
                <p class="text-gray-500 mt-2">No tiene permisos asignados.</p>
            @else
                <ul class="mt-2 border border-gray-300 rounded-md p-2">
                    @foreach ($role->permissions as $permission)
                        <li class="text-gray-800">• {{ $permission->description }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-5 flex justify-center">
            <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                Volver a la lista de roles
            </x-button>
        </div>
    </div>
</div>