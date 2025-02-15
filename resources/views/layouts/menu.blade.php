<nav class="h-full flex-col overflow-hidden">
        <x-nav-link :href="route('docentes.index')" :active="request()->routeIs('docentes.index')">
            <img src="{{ asset('svg/tecito.svg') }}" width="20px" height="20px" alt="">
            
            <span class="font-bold text-white">Tecito</span>
        </x-nav-link>

        @can('firma.index')
        <x-nav-link :href="route('firma.index')" :active="request()->routeIs('firma.index')">
            <img src="{{ asset('svg/jefe.svg') }}" width="20px" height="20px" alt="">

            <span>Jefe</span>
        </x-nav-link>
        @endcan

        @can('usuarios.index')
        <x-nav-link :href="route('usuarios.index')" :active="request()->routeIs('usuarios.index')">
            <img src="{{ asset('svg/usuario.svg') }}" width="20px" height="20px" alt="">
            
            <span>Usuarios</span>
        </x-nav-link>
        @endcan
        
        @can('carreras.index')
        <x-nav-link :href="route('carreras.index')" :active="request()->routeIs('carreras.index')">
            <img src="{{ asset('svg/carrera.svg') }}" width="20px" height="20px" alt="">

            <span>Carreras</span>
        </x-nav-link>

        @endcan
        
        @can('materias.index')
        <x-nav-link :href="route('materias.index')" :active="request()->routeIs('materias.index')">
            <img src="{{ asset('svg/book.svg') }}" width="20px" height="20px" alt="">

            <span>Materias</span>
        </x-nav-link>
        @endcan

        @can('periodos.index')
        <x-nav-link :href="route('periodos.index')" :active="request()->routeIs('periodos.index')">
            <img src="{{ asset('svg/periodo.svg') }}" width="20px" height="20px" alt="">

            <span>Periodos</span>
        </x-nav-link>
        @endcan
        
        @can('actividades.index')
        <x-nav-link :href="route('actividades.index')" :active="request()->routeIs('actividades.index')">
            <img src="{{ asset('svg/actividad.svg') }}" width="20px" height="20px" alt="">

            <span>Actividades</span>
        </x-nav-link>
        @endcan

        @can('grupos.index')
        <x-nav-link :href="route('grupos.index')" :active="request()->routeIs('grupos.index')">
            <img src="{{ asset('svg/grupo.svg') }}" width="20px" height="20px" alt="">

            <span>Grupos</span>
        </x-nav-link>
        @endcan

        @can('archivos.index')
        <x-nav-link :href="route('archivos.index')" :active="request()->routeIs('archivos.index')">
            <img src="{{ asset('svg/archivo.svg') }}" width="20px" height="20px" alt="">

            <span>Archivos</span>
        </x-nav-link>
        @endcan

        @can('roles.index')
        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
            <img src="{{ asset('svg/user.svg') }}" width="20px" height="20px" alt="">
            
            <span>Roles</span>
        </x-nav-link>
        @endcan
</nav>
