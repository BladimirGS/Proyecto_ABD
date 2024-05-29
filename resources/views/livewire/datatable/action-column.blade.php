<div>
    {{-- Eventos de livewire --}}
    <div class="flex justify-start gap-4 xl:gap-8">
        @isset ( $eventoEditar )
            <x-button
            wire:click="{!! $eventoEditar !!}"
            color="blue"
            >Editar</x-button>
        @endif

        @isset ( $enlaceEditar )
            <x-link color="blue" href="{{ $enlaceEditar }}">Editar</x-link>
        @endif

        @isset ( $eventoEliminar )
            <x-button
            wire:click="{{ $eventoEliminar }}"
            color="red"
            >Eliminar</x-button>
        @endif

        {{-- @isset ( $eventoEstado )
            <x-button
                class="w-32"
                wire:click="{{ $eventoEstado }}"
                color="violet"
            >
            @if($actividad->activo == 0)
                Desactivar
            @else
                Activar
            @endif
            </x-button>
        @endif --}}


        @isset ( $accionEliminar )
        <form 
            id="eliminarForm{{ $grupo->id }}" 
            action="{{ $accionEliminar }}" 
            method="POST">
            @csrf
            @method('DELETE')
            <x-button 
                type="button" 
                onclick="mostrarAlerta({{ $grupo->id }})" 
                color="red"
            >Eliminar</x-button>
        </form>
        @endif
    </div>
</div>