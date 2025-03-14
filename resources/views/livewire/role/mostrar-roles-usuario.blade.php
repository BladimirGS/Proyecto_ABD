<div>
    <div class="bg-white mx-auto max-w-2xl p-8 rounded-lg shadow-lg relative">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <h2 class="block font-bold text-lg text-gray-700 text-center">Roles del Usuario</h2>

        <div class="mt-5">
            <x-input-label value="Nombre del Usuario" />
            <p class="text-gray-800 border border-gray-300 rounded-md p-2">{{ $usuario->nombre }}</p>
        </div>
        
        <div class="mt-5">
            <h2 class="block font-medium text-sm text-gray-700">Lista de Roles</h2>
            
            @if ($usuario->roles->isEmpty())
                <p class="text-gray-500 mt-2">Este usuario no tiene roles asignados.</p>
            @else
                <ul class="mt-2 border border-gray-300 rounded-md p-2">
                    @foreach ($usuario->roles as $role)
                        <li class="text-gray-800">• {{ $role->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-5 flex justify-center">
            <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                Cerrar
            </x-button>
        </div>
    </div>
</div>
