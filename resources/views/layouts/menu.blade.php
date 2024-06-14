<nav class="h-full flex-col overflow-hidden">
    <x-nav-link>
        <i class='bx bx-layer text-xl text-white'></i>
        <span class="font-bold text-white">Bedimcode</span>
    </x-nav-link>

        <x-nav-link :href="route('docentes.index')" :active="request()->routeIs('docentes.index')">
            <img src="{{ asset('img/bb.png') }}" alt="" class=" h-5 w-5">
            <span>Tablero</span>
        </x-nav-link>

        @can('usuarios.index')
        <x-nav-link :href="route('usuarios.index')" :active="request()->routeIs('usuarios.index')">
            <i class='bx bx-user text-xl' ></i>
            <span>Usuarios</span>
        </x-nav-link>
        @endcan
        
        @can('carreras.index')
        <x-nav-link :href="route('carreras.index')" :active="request()->routeIs('carreras.index')">
            <i class='bx bx-message-square-detail text-xl' ></i>
            <span>Carreras</span>
        </x-nav-link>

        @endcan
        
        @can('ver-usuario')
        <x-nav-link :href="route('materias.index')" :active="request()->routeIs('materias.index')">
            <i class='bx bx-bookmark text-xl' ></i>
            <span>Materias</span>
        </x-nav-link>
        @endcan

        @can('ver-usuario')
        <x-nav-link :href="route('periodos.index')" :active="request()->routeIs('periodos.index')">
            <i class='bx bx-folder text-xl' ></i>
            <span>Periodos</span>
        </x-nav-link>
        @endcan
        
        @can('ver-usuario')
        <x-nav-link :href="route('actividades.index')" :active="request()->routeIs('actividades.index')">
            <i class='bx bx-bar-chart-alt-2 text-xl' ></i>
            <span>Actividades</span>
        </x-nav-link>
        @endcan

        @can('ver-usuario')
        <x-nav-link :href="route('grupos.index')" :active="request()->routeIs('grupos.index')">
            <i class='bx bx-bar-chart-alt-2 text-xl' ></i>
            <span>Grupos</span>
        </x-nav-link>
        @endcan

        @can('ver-usuario')
        <x-nav-link :href="route('archivos.index')" :active="request()->routeIs('archivos.index')">
            <i class='bx bx-bookmark text-xl' ></i>
            <span>Archivos</span>
        </x-nav-link>
        @endcan

        @can('ver-usuario')
        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
            <i class='bx bx-bookmark text-xl' ></i>
            <span>Roles</span>
        </x-nav-link>
        @endcan
</nav>
