<div>
    {{-- Eventos de livewire --}}
    <div class="flex justify-start gap-4 xl:gap-8">

        @can('usuarios.edit')
            @isset ( $EditarUsuario )
                <x-button
                    wire:click="{{ $EditarUsuario }}"
                    color="blue"
                >Editar</x-button>
            @endif
        @endcan

        @can('usuarios.delete')
            @isset($EliminarUsuario)
                <x-button
                    wire:click="{{ $EliminarUsuario }}"
                    color="red"
                >Eliminar</x-button>
            @endisset
        @endcan    

        @can('usuarios.roles')
            @isset($AsignarRoles)
                <x-button
                    wire:click="{{ $AsignarRoles }}"
                    color="violet"
                >Roles</x-button>
            @endisset
        @endcan    

        @can('carreras.edit')
            @isset ( $EditarCarrera )
                <x-button
                    wire:click="{!! $EditarCarrera !!}"
                    color="blue"
                >Editar</x-button>
            @endif
        @endcan

        @can('carreras.delete')
            @isset($EliminarCarrera)
                <x-button
                    wire:click="{{ $EliminarCarrera }}"
                    color="red"
                >Eliminar</x-button>
            @endisset
        @endcan
        
        @can('materias.edit')
            @isset ( $EditarMateria )
                <x-button
                    wire:click="{{ $EditarMateria }}"
                    color="blue"
                >Editar</x-button>
            @endif
        @endcan

        @can('materias.delete')
            @isset($EliminarMateria)
                <x-button
                    wire:click="{{ $EliminarMateria }}"
                    color="red"
                >Eliminar</x-button>
            @endisset
        @endcan
        
        @can('periodos.edit')
            @isset ( $EditarPeriodo )
                <x-button
                    wire:click="{{ $EditarPeriodo }}"
                    color="blue"
                >Editar</x-button>
            @endif
        @endcan

        @can('periodos.delete')
            @isset($EliminarPeriodo)
                <x-button
                    wire:click="{{ $EliminarPeriodo }}"
                    color="red"
                >Eliminar</x-button>
            @endisset
        @endcan
        
        @can('actividades.edit')
            @isset ( $EditarActividad )
                <x-button
                    wire:click="{{ $EditarActividad }}"
                    color="blue"
                >Editar</x-button>
            @endif
        @endcan

        @can('actividades.delete')
            @isset($EliminarActividad)
            <x-button
                wire:click="{{ $EliminarActividad }}"
                color="red"
            >Eliminar</x-button>
        
            @endisset
        @endcan
        
        @can('grupos.edit')
            @isset ( $EditarGrupo )
                <x-link color="blue" href="{{ $EditarGrupo }}">Editar</x-link>
            @endif
        @endcan

        @can('grupos.delete')
            @isset($EliminarGrupo)
                <x-button
                    wire:click="{{ $EliminarGrupo }}"
                    color="red"
                >Eliminar</x-button>
            @endisset
        @endcan
        
        @can('roles.edit')
            @isset ( $EditarRole )
                <x-link color="blue" href="{{ $EditarRole }}">Editar</x-link>
            @endif
        @endcan

        @can('roles.delete')
            @isset($EliminarRole)
            <x-button
                wire:click="{{ $EliminarRole }}"
                color="red"
            >Eliminar</x-button>
        
            @endisset
        @endcan

        @can('archivos.descargar')
            @isset($DescargarArchivo)
                <x-button
                    wire:click="{{ $DescargarArchivo }}"
                    color="violet"
                >Descargar</x-button>
            @endisset
        @endcan
        
        @isset ( $EditarDocenteGrupo )
            <x-link color="blue" href="{{ $EditarDocenteGrupo }}">Editar</x-link>
        @endif

        @isset($EliminarDocenteGrupo)
            <x-button
                wire:click="{{ $EliminarDocenteGrupo }}"
                color="red"
            >Eliminar</x-button>
        @endisset

        @isset($DescargarGrupoArchivo)
            <x-button
                wire:click="{{ $DescargarGrupoArchivo }}"
                color="violet"
            >Descargar</x-button>
        @endisset

        
        @can('reportes.descargar')
            @isset($Exportar)
                <x-button
                    wire:click="{{ $Exportar }}"
                    color="violet"
                >Exportar</x-button>
            @endisset
        @endcan
        
    </div>
</div>