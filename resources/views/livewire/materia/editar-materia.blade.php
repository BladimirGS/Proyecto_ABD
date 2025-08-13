<div>
    <div class="md:flex md:justify-center p-10">
        <button wire:click="$dispatch('closeModal')" type="button"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarMateria">
            @csrf

            <h2 class="block font-bold text-lg text-gray-700 text-center uppercase">Editar materia</h2>

            <div class="mt-5">
                <x-input-label for="clave" value="clave" class="uppercase" />

                <x-text-input id="clave" type="text" wire:model="clave" :value="$materia->clave"
                    placeholder="clave del materia" class="uppercase" />
                <x-input-error :messages="$errors->get('clave')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" class="uppercase" />

                <x-text-input id="nombre" type="text" wire:model="nombre" :value="$materia->nombre"
                    placeholder="Nombre del materia" class="uppercase" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
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