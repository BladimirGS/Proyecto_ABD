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
                <x-nav-link :href="route('docentes.index')" :active="request()->routeIs('docentes.index')">
                    <img src="{{ asset('svg/inicio.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Inicio</span>
                </x-nav-link>

                @can('firma.index')
                <x-nav-link :href="route('docente.grupos.index')" :active="request()->routeIs('docente.grupos.index')">
                    <img src="{{ asset('svg/grupos.svg') }}" alt="" class="mr-3 h-5 w-5">

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

                @can('carreras.index')
                <x-nav-link :href="route('carreras.index')" :active="request()->routeIs('carreras.index')">
                    <img src="{{ asset('svg/carrera.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Carreras</span>
                </x-nav-link>

                @endcan

                @can('materias.index')
                <x-nav-link :href="route('materias.index')" :active="request()->routeIs('materias.index')">
                    <img src="{{ asset('svg/materia.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Materias</span>
                </x-nav-link>
                @endcan

                @can('periodos.index')
                <x-nav-link :href="route('periodos.index')" :active="request()->routeIs('periodos.index')">
                    <img src="{{ asset('svg/periodo.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Periodos</span>
                </x-nav-link>
                @endcan

                @can('actividades.index')
                <x-nav-link :href="route('actividades.index')" :active="request()->routeIs('actividades.index')">
                    <img src="{{ asset('svg/actividad.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Actividades</span>
                </x-nav-link>
                @endcan

                @can('grupos.index')
                <x-nav-link :href="route('grupos.index')" :active="request()->routeIs('grupos.index')">
                    <img src="{{ asset('svg/grupo.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Grupos</span>
                </x-nav-link>
                @endcan

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
                <x-nav-button id="RolesButton" :active="request()->routeIs(['roles.index', 'roles.usuario.index'])">
                    <img src="{{ asset('svg/roles.svg') }}" alt="" class="mr-3 h-5 w-5">

                    <span>Roles</span>
                </x-nav-button>
                @endcan

                <ul id="RolesMenu" class="hidden space-y-1">
                    <li class="relative">
                        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')" class="pl-8">
                            <span>Administrar Roles</span>
                        </x-nav-link>
                    </li>
                    <li class="relative">
                        <x-nav-link :href="route('roles.usuario.index')" :active="request()->routeIs('roles.usuario.index')" class="pl-8">
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

    document.getElementById('RolesButton').addEventListener('click', function () {
        let menu = document.getElementById('RolesMenu');
        menu.classList.toggle('hidden');
    });
</script>