<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        Asignar roles
    </h1>

    <div class="py-10 w-full 2xl:w-2/3 mx-auto">
        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.usuario-role-datatable />
        </div>
    </div>

@push('styles')
    @vite('resources/css/alert.css')  
@endpush

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/js/alert.js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('status'))
            Livewire.dispatch('exito');
            @endif
        });
    </script>
@endpush
</x-app-layout>