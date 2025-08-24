<nav class="flex items-center justify-end">
    <!-- Notificaciones -->
    <a class="flex items-center justify-center w-7 h-7 bg-indigo-600 hover:bg-indigo-800 rounded-full text-sm font-extrabold text-white" href="{{ route('notificaciones.index')}}">
        {{ auth()->user()->unreadNotifications->count() }}
    </a>

    <!-- Dropdown de Usuario -->
    <x-dropdown width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <span class="hidden md:inline-block w-32 truncate text-center">{{ Auth::user()->nombre }}</span>

                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
                Perfil
            </x-dropdown-link>

            <!-- Cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link 
                    onclick="event.preventDefault();
                    this.closest('form').submit();"
                    class="cursor-pointer"
                >
                    Cerrar Sesión
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</nav>
