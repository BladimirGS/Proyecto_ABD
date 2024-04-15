<div class="bg-gray-100">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold">Buscar y Filtrar Usuarios</h2>

    <div class="max-w-7xl mx-auto my-5">
        <form wire:submit.prevent="leerDatosFormulario">
            <div class="flex gap-5">
                <div class="w-full">
                    <input 
                        id="termino"
                        type="text"
                        placeholder="Buscar por Término: ej. Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="termino"
                    />
                </div>

                <div class="my-auto">
                    <input 
                        type="submit"
                        class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                        value="Buscar"
                    />
                </div>
            </div>
        </form>
    </div>
</div>