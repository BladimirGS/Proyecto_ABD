<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Carrera</h2>
    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 shadow-sm sm:rounded-lg mx-auto">
            <div class="bg-white md:flex md:justify-center p-10">
                <form class="md:w-3/4 lg:w-4/5" action="{{ route('carreras.store') }}" method="POST">
                    @csrf
            
                    <legend class="block font-bold text-lg text-gray-700 text-center">Registrar carrera</legend>
            
                    <div class="mt-5">
                        <x-input-label for="nombre" value="Nombre" />
            
                        <x-text-input
                            id="nombre"
                            type="text"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            placeholder="Nombre de la carrera"
                        />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>
            
        
                    <div class="mt-5 flex justify-between">
                        <x-link href="{{ route('carreras.index') }}">Regresar</x-link>

                        <x-button type="submit" color="green">
                            Registrar Carrera
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
