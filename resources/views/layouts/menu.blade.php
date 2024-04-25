<nav class="h-full flex flex-col justify-between overflow-hidden">
    <div>
        <x-nav-link class="mb-8">
            <i class='bx bx-layer text-xl text-white'></i>
            <span class="font-bold text-white">Bedimcode</span>
        </x-nav-link>

        <div>
            <x-nav-link>
                <img src="{{ asset('img/bb.png') }}" alt="" class=" h-5 w-5">
                <span class="">Dashboard</span>
            </x-nav-link>

            <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
                <i class='bx bx-user text-xl' ></i>
                <span>Users</span>
            </x-nav-link>
            
            <x-nav-link>
                <i class='bx bx-message-square-detail text-xl' ></i>
                <span>Messages</span>
            </x-nav-link>

            <x-nav-link>
                <i class='bx bx-bookmark text-xl' ></i>
                <span>Favorites</span>
            </x-nav-link>

            <x-nav-link>
                <i class='bx bx-folder text-xl' ></i>
                <span>Data</span>
            </x-nav-link>

            <x-nav-link>
                <i class='bx bx-bar-chart-alt-2 text-xl' ></i>
                <span>Analytics</span>
            </x-nav-link>
        </div>
    </div>
</nav>
