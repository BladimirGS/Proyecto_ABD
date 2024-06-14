<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">Grupos</h2>
    </x-slot>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.docente-grupo-datatable />
        </div>
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (id) => {
                Swal.fire({
                    title: 'Eliminar grupo?',
                    text: "Un grupo eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'si, Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eliminar el grupo
                        Livewire.dispatch('eliminar-docente-grupo', id)

                        Swal.fire(
                            'Se elimino el grupo',
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