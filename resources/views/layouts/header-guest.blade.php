<header class="bg-white text-gray-800 shadow-md">
    <div class="container mx-auto px-3 py-4 sm:px-4 sm:py-5">
        <div class="flex flex-col items-center sm:flex-row sm:justify-between">
            <div class="flex flex-row items-center space-x-3 mb-3 sm:mb-0">
                <div id="logo-container"
                    class="flex flex-row items-center space-x-3 mb-2 sm:mb-0">
                    <!-- Logo TecNM (ocultado en pantallas pequeñas) -->
                    <div class="relative w-10 h-10">
                        <img src="{{ asset('logos/logotecNM.png') }}" alt="TecNM Logo"
                            class="object-contain w-full h-full" />
                    </div>

                    <!-- Logo ITO (visible en todas las pantallas) -->
                    <div class="relative w-10 h-10">
                        <img src="{{ asset('logos/ItoLogo.png') }}" alt="ITO Logo"
                            class="object-contain w-full h-full" />
                    </div>
                </div>

                <div id="text-container" class="text-center sm:text-left space-y-1">
                    <h1 class="text-sm sm:text-base font-bold text-[#1e355e] hidden sm:block">
                        Tecnológico Nacional de México
                    </h1>
                
                    <h2 class="text-xs font-semibold text-gray-700 hidden sm:block">
                        Instituto Tecnológico de Oaxaca
                    </h2>
                </div>
            </div>

            <div class="flex items-center">
                <div class="text-right space-y-1">
                    <h3 class="text-xs sm:text-sm font-semibold text-black">Departamento de Ciencias
                        Económico-Administrativas</h3>
                    <p class="text-xs text-gray-700">Gestión del Protocolo de Docencia</p>
                </div>
            </div>
        </div>
    </div>
</header>
