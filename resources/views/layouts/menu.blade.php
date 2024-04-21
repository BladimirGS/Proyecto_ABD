<nav class="h-full flex flex-col justify-between overflow-hidden">
    @auth
        <div>
            <a href="#" class="grid grid-cols-[max-content,max-content] items-center gap-x-4 py-2 pl-6 mb-8">
                <i class='bx bx-layer nav__logo-icon'></i>
                <span class="nav__logo-name">Bedimcode</span>
            </a>

            <div>
                <a href="{{ route('dashboard') }}" class="nav__link">
                <i class='bx bx-grid-alt nav__icon' ></i>
                    <span class="">Dashboard</span>
                </a>

                <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
                    <i class='bx bx-grid-alt nav__icon' ></i>
                    <span class="">Dashboard</span>
                </x-nav-link>

                <a href="{{ route('users') }}" class="nav__link">
                    <i class='bx bx-user nav__icon' ></i>
                    <span class="nav__name">Users</span>
                </a>
                
                <a href="#" class="nav__link">
                    <i class='bx bx-message-square-detail nav__icon' ></i>
                    <span class="nav__name">Messages</span>
                </a>

                <a href="#" class="nav__link">
                    <i class='bx bx-bookmark nav__icon' ></i>
                    <span class="nav__name">Favorites</span>
                </a>

                <a href="#" class="relative text-violet-300 mb-6 transition-all hover:text-white grid grid-cols-[max-content,max-content] items-center gap-x-4 py-2 pl-6">
                    <i class='bx bx-folder nav__icon' ></i>
                    <span class="nav__name">Data</span>
                </a>

                <a href="#" class="nav__link">
                    <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                    <span class="nav__name">Analytics</span>
                </a>
            </div>
        </div>

        <a href="#" class="nav__link">
            <i class='bx bx-log-out nav__icon' ></i>
            <span class="nav__name">Log Out</span>
        </a>
    @endauth
</nav>
