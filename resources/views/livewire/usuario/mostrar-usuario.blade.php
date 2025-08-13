<div>
    <div class="bg-white mx-auto max-w-2xl p-8 rounded-lg shadow-lg relative">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <h2 class="block font-extrabold text-xl text-gray-800 text-center mb-6 uppercase">Información del Usuario</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-gray-100 p-4 rounded-md">
                <x-input-label for="nombre" value="Nombre" class="text-gray-600 font-semibold uppercase" />
                <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                    {{ $usuario->nombre }}
                </div>
            </div>

            <div class="bg-gray-100 p-4 rounded-md">
                <x-input-label for="apellido" value="Apellido" class="text-gray-600 font-semibold uppercase" />
                <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                    {{ $usuario->apellido }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <div class="bg-gray-100 p-4 rounded-md">
                <x-input-label for="genero" value="Género" class="text-gray-600 font-semibold uppercase" />
                <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                    {{ $usuario->genero }}
                </div>
            </div>

            <div class="bg-gray-100 p-4 rounded-md">
                <x-input-label for="edad" value="Edad" class="text-gray-600 font-semibold uppercase" />
                <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                    {{ $usuario->edad }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <div class="bg-gray-100 p-4 rounded-md">
                <x-input-label for="rfc" value="RFC" class="text-gray-600 font-semibold uppercase" />
                <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                    {{ $usuario->rfc }}
                </div>
            </div>

            <div class="bg-gray-100 p-4 rounded-md">
                <x-input-label for="grado_estudio" value="Último grado de estudio"
                    class="text-gray-600 font-semibold uppercase" />
                <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                    {{ $usuario->grado_estudio }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <div class="bg-gray-100 p-4 rounded-md">
                <x-input-label for="telefono" value="Teléfono" class="text-gray-600 font-semibold uppercase" />
                <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                    {{ $usuario->telefono }}
                </div>
            </div>

            <div class="bg-gray-100 p-4 rounded-md">
                <x-input-label for="placa_vehicular" value="Placa Vehicular" class="text-gray-600 font-semibold uppercase" />
                <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                    {{ $usuario->placa_vehicular }}
                </div>
            </div>
        </div>

        <div class="bg-gray-100 p-4 rounded-md mt-6">
            <x-input-label for="email" value="Correo" class="text-gray-600 font-semibold" />
            <div class="mt-1 w-full h-10 bg-white border-gray-300 rounded-md shadow-sm flex items-center px-2">
                {{ $usuario->email }}
            </div>
        </div>
    </div>
</div>