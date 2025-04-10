<div id="sideMenuBackdrop" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

<div id="sideMenu"
    class="fixed top-0 left-0 h-full w-64 bg-gray-100 shadow-lg z-50 transform transition-transform duration-300 ease-in-out -translate-x-full">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Menú</h2>

            <button id="closeMenuButton" class="p-1 rounded-full hover:bg-gray-200 transition-colors duration-200">
                <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="ml-4">
            <ul class="space-y-2">
                <x-nav-link :href="route('admin.index')" :active="request()->routeIs('docentes.index')">
                    <img src="{{ asset('svg/inicio.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Inicio</span>
                </x-nav-link>

                @can('docentes.index')
                <x-nav-link :href="route('docente.grupos.index')" :active="request()->routeIs('docente.grupos.index')">
                    <img src="{{ asset('svg/tablero.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Mis grupos</span>
                </x-nav-link>
                @endcan

                @can('firma.index')
                <x-nav-link :href="route('firma.index')" :active="request()->routeIs('firma.index')">
                    <img src="{{ asset('svg/jefe.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Jefe</span>
                </x-nav-link>
                @endcan

                @can('usuarios.index')
                <x-nav-link :href="route('usuarios.index')" :active="request()->routeIs('usuarios.index')">
                    <img src="{{ asset('svg/usuario.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Usuarios</span>
                </x-nav-link>
                @endcan
                
                @can('admin.index')
                <x-nav-button id="AdminButton" :active="request()->routeIs(['carreras.index', 'materias.index', 'periodos.index'])">
                    <img src="{{ asset('svg/administracion.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Administración</span>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" id="dropdown">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>                    
                </x-nav-button>
                
                <ul id="AdminMenu" class="hidden space-y-1">
                    <li class="relative">

                        @can('carreras.index')
                        <x-nav-link :href="route('carreras.index')" :active="request()->routeIs('carreras.index')" class="pl-8">
                            <img src="{{ asset('svg/carrera.svg') }}" alt="" class="mr-3 h-5 w-5">
        
                            <span>Carreras</span>
                        </x-nav-link>
                        @endcan
                    </li>
                    <li class="relative">
                        @can('materias.index')
                        <x-nav-link :href="route('materias.index')" :active="request()->routeIs('materias.index')" class="pl-8">
                            <img src="{{ asset('svg/materia.svg') }}" alt="" class="mr-3 h-5 w-5">
        
                            <span>Materias</span>
                        </x-nav-link>
                        @endcan
                    </li>
                    <li class="relative">

                        @can('periodos.index')
                        <x-nav-link :href="route('periodos.index')" :active="request()->routeIs('periodos.index')" class="pl-8">
                            <img src="{{ asset('svg/periodo.svg') }}" alt="" class="mr-3 h-5 w-5">
        
                            <span>Periodos</span>
                        </x-nav-link>
                        @endcan
                    </li>
                </ul>
                @endcan

                @can('actividades.index')
                <x-nav-link :href="route('actividades.index')" :active="request()->routeIs('actividades.index')">
                    <img src="{{ asset('svg/actividad.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Actividades</span>
                </x-nav-link>
                @endcan

                @can('grupos.index')
                <x-nav-button id="GrupoButton" :href="route('grupos.index')" :active="request()->routeIs(['grupos.index', 'grupos.usuarios.index'])">
                    <img src="{{ asset('svg/grupo.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Grupos</span>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  id="dropdown">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>                    
                </x-nav-button>
                @endcan

                <ul id="GrupoMenu" class="hidden space-y-1">
                    <li class="relative">
                        <x-nav-link :href="route('grupos.index')" :active="request()->routeIs('grupos.index')" class="pl-8">
                            <span>Administrar Grupo</span>
                        </x-nav-link>
                    </li>
                    <li class="relative">
                        <x-nav-link :href="route('grupos.usuarios.index')" :active="request()->routeIs('grupos.usuarios.index')" class="pl-8">
                            <span>Asignar Grupos</span>
                        </x-nav-link>
                    </li>
                </ul>

                @can('archivos.index')
                <x-nav-link :href="route('archivos.index')" :active="request()->routeIs('archivos.index')">
                    <img src="{{ asset('svg/archivo.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Archivos</span>
                </x-nav-link>
                @endcan

                @can('reportes.index')
                <x-nav-link :href="route('reportes.index')" :active="request()->routeIs('reportes.index')">
                    <img src="{{ asset('svg/reporte.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Reportes</span>
                </x-nav-link>
                @endcan

                @can('roles.index')
                <x-nav-button id="RolesButton" :active="request()->routeIs(['roles.index', 'roles.usuarios.index'])">
                    <img src="{{ asset('svg/roles.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Roles</span>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  id="dropdown">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>                    
                </x-nav-button>
                @endcan

                <ul id="RolesMenu" class="hidden space-y-1">
                    <li class="relative">
                        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')" class="pl-8">
                            <span>Administrar Roles</span>
                        </x-nav-link>
                    </li>
                    <li class="relative">
                        <x-nav-link :href="route('roles.usuarios.index')" :active="request()->routeIs('roles.usuarios.index')" class="pl-8">
                            <span>Asignar Roles</span>
                        </x-nav-link>
                    </li>
                </ul>

                <x-nav-button id="optionsButton"  :active="request()->routeIs('profile.edit')">
                    <img src="{{ asset('svg/opciones.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Opciones</span>
                </x-nav-button>
                
                <ul id="optionsMenu" class="hidden space-y-1">
                    <li class="relative">
                        <x-nav-link href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')" class="pl-8">
                            Perfil
                        </x-nav-link>
                    </li>
                    <li class="relative">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-nav-button type="submit" class="pl-8">
                                Cerrar Sesión
                            </x-nav-button>
                        </form>
                    </li>
                </ul>
            </ul>
        </nav>
    </div>
</div>

<script>
    document.getElementById('optionsButton').addEventListener('click', function () {
        let menu = document.getElementById('optionsMenu');
        menu.classList.toggle('hidden');
    });

    function toggleMenu(buttonId, menuId) {
        let button = document.getElementById(buttonId);
        if (button) {
            button.addEventListener('click', function () {
                let menu = document.getElementById(menuId);
                let icon = button.querySelector('#dropdown');
                menu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180'); 
            });
        }
    }

    toggleMenu('RolesButton', 'RolesMenu');
    toggleMenu('AdminButton', 'AdminMenu');
    toggleMenu('GrupoButton', 'GrupoMenu');
</script>
