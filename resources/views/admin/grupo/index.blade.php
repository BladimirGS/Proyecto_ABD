<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        Lista de grupos
    </h1>

    <div class="py-10 ">
        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.grupo-datatable />
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
                    title: 'Eliminar grupo?',
                    text: "Un grupo eliminada no se puede recuperar",
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
                        Livewire.dispatch('eliminar-grupo', id);
                        
                        Livewire.dispatch('exito');
                    }
                })
            })
        })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('status'))
            Livewire.dispatch('exito');
            @endif
        });
    </script>
@endpush
</x-app-layout>