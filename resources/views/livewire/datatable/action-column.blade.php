<div>
    <div class="flex justify-start gap-4 xl:gap-8">       
        @can('usuarios.show')
            @isset($MostarUsuario)
                <x-button
                    wire:click="{{ $MostarUsuario }}"
                    color="amber"
                >Ver</x-button>
            @endisset
        @endcan  

        @can('usuarios.edit')
            @isset ( $EditarUsuario )
                <x-button
                    wire:click="{{ $EditarUsuario }}"
                    color="blue"
                >Editar</x-button>
            @endif
        @endcan

        @can('usuarios.destroy')
            @isset($EliminarUsuario)
                <x-button
                    wire:click="{{ $EliminarUsuario }}"
                    color="red"
                >Eliminar</x-button>
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

        @can('carreras.destroy')
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

        @can('materias.destroy')
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

        @can('periodos.destroy')
            @isset($EliminarPeriodo)
                <x-button
                    wire:click="{{ $EliminarPeriodo }}"
                    color="red"
                >Eliminar</x-button>
            @endisset
        @endcan

        @can('actividades.show')
            @isset ( $MostrarActividad )
                <x-button
                    wire:click="{{ $MostrarActividad }}"
                    color="amber"
                >Ver</x-button>
            @endif
        @endcan
        
        @can('actividades.edit')
            @isset ( $EditarActividad )
                <x-button
                    wire:click="{{ $EditarActividad }}"
                    color="blue"
                >Editar</x-button>
            @endif
        @endcan

        @can('actividades.destroy')
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

        @can('grupos.destroy')
            @isset($EliminarGrupo)
                <x-button
                    wire:click="{{ $EliminarGrupo }}"
                    color="red"
                >Eliminar</x-button>
            @endisset
        @endcan

        @can('grupos.usuarios.show')
            @isset($VerGrupos)
                <x-button
                    wire:click="{{ $VerGrupos }}"
                    color="amber"
                >Ver</x-button>
            @endisset
        @endcan   

        @can('grupos.usuarios.assign')
            @isset($AsignarGrupos)
                <x-button
                    wire:click="{{ $AsignarGrupos }}"
                >Asignar</x-button>
            @endisset
        @endcan
        
        @can('Roles.show')
            @isset($MostarRole)
                <x-button
                    wire:click="{{ $MostarRole }}"
                    color="amber"
                >Ver</x-button>
            @endisset
        @endcan

        @can('roles.edit')
            @isset ( $EditarRole )
                <x-link color="blue" href="{{ $EditarRole }}">Editar</x-link>
            @endif
        @endcan

        @can('roles.destroy')
            @isset($EliminarRole)
            <x-button
                wire:click="{{ $EliminarRole }}"
                color="red"
            >Eliminar</x-button>
            @endisset
        @endcan

        @can('roles.usuario.show')
            @isset($VerRoles)
                <x-button
                    wire:click="{{ $VerRoles }}"
                    color="amber"
                >Ver</x-button>
            @endisset
        @endcan   

        @can('roles.usuario.assign')
            @isset($AsignarRoles)
                <x-button
                    wire:click="{{ $AsignarRoles }}"
                >Asignar</x-button>
            @endisset
        @endcan

        @can('firma.descargar')
            @isset($IrArchivo)
                <x-link color="amber" href="{{ $IrArchivo }}">Ir</x-link>
            @endisset
        @endcan

        @can('archivos.descargar')
            @isset($verArchivo)
                <x-button
                    wire:click="{{ $verArchivo }}"
                >Descargar</x-button>
            @endisset
        @endcan

        @can('reportes.descargar')
            @isset($Exportar)
                <x-button
                    wire:click="{{ $Exportar }}"
                >Reporte Detallado</x-button>
            @endisset
        @endcan

        @can('reportes.descargar')
            @isset($ReporteGeneral)
                <x-button
                    wire:click="{{ $ReporteGeneral }}"
                    color="amber"
                >Reporte General</x-button>
            @endisset
        @endcan
    </div>
</div>