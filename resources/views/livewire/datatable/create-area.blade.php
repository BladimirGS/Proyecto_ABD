<div class="w-full flex items-center justify-center h-full">
    @can('usuarios.create')
        @isset($CrearUsuario)
            <x-button color="green" class="w-full" wire:click="{{ $CrearUsuario }}">Nuevo</x-button>
        @endisset
    @endcan

    @can('carreras.create')
        @isset($CrearCarrera)
            <x-button color="green" class="w-full" wire:click="{{ $CrearCarrera }}">Nuevo</x-button>
        @endisset
    @endcan

    @can('materias.create')
        @isset($CrearMateria)
            <x-button color="green" class="w-full text-center" wire:click="{{ $CrearMateria }}">Nuevo</x-button>
        @endisset
    @endcan

    @can('periodos.create')
        @isset($CrearPeriodo)
            <x-button color="green" class="w-full" wire:click="{{ $CrearPeriodo }}">Nuevo</x-button>
        @endisset
    @endcan

    @can('actividades.create')
        @isset($CrearActividad)
            <x-button color="green" class="w-full" wire:click="{{ $CrearActividad }}">Nuevo</x-button>
        @endisset
    @endcan

    @can('grupos.create')
        @isset($CrearGrupo)
            <x-link color="green" class="w-full" href="{{ $CrearGrupo }}">Nuevo</x-link>
        @endisset
    @endcan

    @can('roles.create')
        @isset($CrearRole)
            <x-link color="green" class="w-full" href="{{ $CrearRole }}">Nuevo</x-link>
        @endisset
    @endcan
</div>
