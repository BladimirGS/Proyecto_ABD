<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        Lista de periodos
    </h1>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full 2xl:w-4/5 mx-auto px-4 lg:px-8 py-10">

            <livewire:Datatable.periodo-datatable>

        </div>
    </div>

@push('styles')
    @vite('resources/css/alert.css')  
@endpush

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/js/alert.js')

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (id) => {
                Swal.fire({
                    title: 'Eliminar periodo?',
                    text: "Una periodo eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'si, Eliminar!',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        confirmButton: 'btn-confirm',
                        cancelButton: 'btn-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar-periodo', id);
                        
                        Livewire.dispatch('exito');
                    }
                })
            })
        })
    </script>
@endpush
</x-app-layout>
