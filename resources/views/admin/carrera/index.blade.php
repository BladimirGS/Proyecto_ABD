<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">Carreras</h2>
    </x-slot>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full xl:w-3/4 2xl:w-3/5 mx-auto px-4 lg:px-8 py-10">

            <livewire:Datatable.carrera-datatable>

        </div>
    </div>

    @push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (id) => {
                Swal.fire({
                    title: 'Eliminar carrera?',
                    text: "Una carrera eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'si, Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eliminar la carrera
                        Livewire.dispatch('eliminar-carrera', id)

                        Swal.fire(
                            'Se elimino la carrera',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })
            })
        })
    </script>

    @endpush
</x-app-layout>
