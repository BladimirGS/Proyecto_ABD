<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">Notificaciones</h2>
    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 bg-white shadow-sm sm:rounded-lg mx-auto">
            <h1 class="text-2xl font-bold text-center my-5 py-10">Mis Notificaciones</h1>

            <div class="bg-white px-10 pb-10">
                @forelse ($notificaciones as $notificacion)
                    <div class="p-5 border border-gray-200 sm:flex sm:justify-between sm:items-center">
                        <div>
                            <p>tienes una revisión en:
                                <span class="font-bold">{{ $notificacion->data['nombre_actividad'] }}</span>
                            </p>
                            <p>Grupo:
                                <span class="font-bolf">{{ $notificacion->data['clave_grupo'] }}</span>
                            </p>
                            <p>
                                <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                            </p>
                        </div>

                        <div class="mt-5 lg:mt-0"> 
                            <a href="#" class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                Ver revision
                            </a>
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
