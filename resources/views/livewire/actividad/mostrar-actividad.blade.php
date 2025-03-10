<div>
    <div class="bg-white mx-auto max-w-2xl p-8 rounded-lg shadow-lg relative">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <h2 class="block font-bold text-lg text-gray-700 text-center">Detalles de la Actividad</h2>

        <div class="mt-5">
            <x-input-label for="nombre" value="Nombre" />
            <div class="mt-1 w-full h-10 bg-gray-100 border-gray-300 rounded-md shadow-sm flex items-center px-2">
                {{ $actividad->nombre ?? ''}}
            </div>
        </div>

        <div class="mt-5">
            <x-input-label for="descripcion" value="Descripción" />
            <div class="mt-1 w-full bg-gray-100 border-gray-300 rounded-md shadow-sm p-2">
                {{ $actividad->descripcion ?? ''}}
            </div>
        </div>

        <div class="mt-5">
            <x-input-label for="firma" value="¿Requiere firma del jefe?" />
            <div class="mt-1 w-full h-10 bg-gray-100 border-gray-300 rounded-md shadow-sm flex items-center px-2">
                {{ $actividad->firma ? 'Sí' : 'No' }}
            </div>
        </div>

        <div class="mt-5">
            <x-input-label for="fecha" value="Fecha programada" />
            <div class="mt-1 w-full h-10 bg-gray-100 border-gray-300 rounded-md shadow-sm flex items-center px-2">
                {{ $actividad->fecha ?? ''}}
            </div>
        </div>

        <div class="mt-5">
            <x-input-label for="periodo_id" value="Periodo" />
            <div class="mt-1 w-full h-10 bg-gray-100 border-gray-300 rounded-md shadow-sm flex items-center px-2">
                {{ $actividad->periodo->nombre ?? ''}}
            </div>
        </div>
    </div>
</div>