<nav class="nav">
    @auth
        <div>
            <a href="#" class="nav__logo">
                <i class='bx bx-layer nav__logo-icon'></i>
                <span class="nav__logo-name">Bedimcode</span>
            </a>

            <div class="nav__list">
                <a href="{{ route('dashboard') }}" class="nav__link active">
                <i class='bx bx-grid-alt nav__icon' ></i>
                    <span class="nav__name">Dashboard</span>
                </a>

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

                <a href="#" class="nav__link">
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
