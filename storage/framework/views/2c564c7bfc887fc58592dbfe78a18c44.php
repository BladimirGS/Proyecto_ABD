<header class="bg-white text-gray-800 shadow-md">
    <div class="container mx-auto px-3 py-4 sm:px-4 sm:py-5">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <div class="flex items-center space-x-4">
                <button id="menuButton"
                    class="p-2 text-gray-700 hover:bg-gray-100 rounded-full transition-colors duration-200 focus:outline-none"
                    aria-label="Abrir menú">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-6 w-6">
                        <line x1="4" x2="20" y1="12" y2="12" />
                        <line x1="4" x2="20" y1="6" y2="6" />
                        <line x1="4" x2="20" y1="18" y2="18" />
                    </svg>
                </button>
                <div>
                    <h1 class="text-sm sm:text-base font-bold text-gray-800">
                        Gestión del Protocolo de Docencia
                    </h1>
                    <h2 class="text-xs sm:text-sm font-semibold text-black">Departamento de Ciencias Económico-Administrativas</h2>
                </div>
            </div>
            <!-- Navegación que solo se muestra en pantallas medianas y mayores -->
            <div class="items-center space-x-4 sm:block hidden">
                <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </div>
    
    <?php echo $__env->make('layouts.menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuButton = document.getElementById('menuButton');
        const sideMenu = document.getElementById('sideMenu');
        const closeMenuButton = document.getElementById('closeMenuButton');
        const sideMenuBackdrop = document.getElementById('sideMenuBackdrop');
        const logoutButton = document.getElementById('logoutButton');

        function openSideMenu() {
            sideMenu.classList.toggle('-translate-x-full');  // Abre el menú
            sideMenu.classList.toggle('translate-x-0');
            sideMenuBackdrop.classList.remove('hidden');  // Muestra el fondo
        }

        function closeSideMenu() {
            sideMenu.classList.toggle('-translate-x-full');  // Cierra el menú
            sideMenu.classList.toggle('translate-x-0');
            sideMenuBackdrop.classList.add('hidden');  // Oculta el fondo
        }

        menuButton.addEventListener('click', openSideMenu);
        closeMenuButton.addEventListener('click', closeSideMenu);
        sideMenuBackdrop.addEventListener('click', closeSideMenu);  // Cierra el menú al hacer clic fuera de él
    });
</script>

<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views\layouts\header.blade.php ENDPATH**/ ?>