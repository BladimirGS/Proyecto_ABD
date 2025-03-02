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
                    confirmButtonText: 'Sí, Eliminar!',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        confirmButton: 'custom-swal-confirm',
                        cancelButton: 'custom-swal-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eliminar la carrera
                        Livewire.dispatch('eliminar-carrera', id)
    
                        Swal.fire({
                            title: 'Se eliminó la carrera',
                            text: 'Eliminado correctamente',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'custom-swal-ok'
                            }
                        });
                    }
                })
            })
        })
    </script>
    
    @endpush
</x-app-layout>
