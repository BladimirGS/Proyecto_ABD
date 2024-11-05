<div>
    <div class="md:flex md:justify-center p-10">
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="CrearComentario">
            @csrf
    
            <legend class="block font-bold text-lg text-gray-700 text-center">Agregar comentario</legend>
    
            <div class="mt-5">
                <x-text-input
                    id="comentario"
                    type="text"
                    wire:model="comentario"
                    :value="old('comentario')"
                    placeholder="comentario de la materia"
                />
                <x-input-error :messages="$errors->get('comentario')" class="mt-2" />
            </div>
    
            <div class="mt-5 text-center">
                <x-button type="submit">
                    Guardar comentario
                </x-button>
            </div>
        </form>
    </div>
</div>