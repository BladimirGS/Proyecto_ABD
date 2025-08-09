<x-app-layout>
    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 shadow-sm sm:rounded-lg mx-auto">
            <div class="bg-white md:flex md:justify-center p-10">
                <form class="md:w-3/4 lg:w-4/5" action="{{ route('grupos.store') }}" method="POST">
                    @csrf
            
                    <h2 class="block font-bold text-lg text-gray-700 text-center">Registrar grupo</h2>
            
                    <div class="mt-5">
                        <x-input-label for="clave" value="Clave" />
            
                        <x-text-input
                            id="clave"
                            type="text"
                            name="clave"
                            value="{{ old('clave') }}"
                            placeholder="{{ old('clave') ?? 'Clave del grupo' }}"
                        />
                        <x-input-error :messages="$errors->get('clave')" class="mt-2" />
                    </div>
            
                    <div class="mt-5">
                        <x-input-label for="semestre" value="Semestre" />
            
                        <x-text-input
                            id="semestre"
                            type="number"
                            name="semestre"
                            value="{{ old('semestre') }}"
                            placeholder="{{ old('semestre') ?? 'Semestre del grupo' }}"
                        />
                        <x-input-error :messages="$errors->get('semestre')" class="mt-2" />
                    </div>
            
                    <div class="mt-5">
                        <x-input-label for="carrera_id" value="Carrera" />
    
                        <select name="carrera_id" id="carrera_id" class="selectCarreras">
                            <option></option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}" {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}>{{ $carrera->nombre }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('carrera_id')" class="mt-2" />
                    </div>

                    <div class="mt-5">
                        <x-input-label for="materia_id" value="Materia" />
    
                        <select name="materia_id" id="materia_id" class="selectMaterias">
                            <option></option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}" {{ old('materia_id') == $materia->id ? 'selected' : '' }}>{{ $materia->nombre }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('materia_id')" class="mt-2" />
                    </div>

                    <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                        <x-link href="{{ route('grupos.index') }}" color="red" class="w-full md:w-auto">
                            Cancelar
                        </x-link>
                    
                        <x-button type="submit" class="w-full md:w-auto">
                            Registrar grupo
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.selectCarreras').select2({
            placeholder: 'seleccione uno'
        });

        $('.selectMaterias').select2({
            placeholder: 'seleccione uno'
        });
    })
</script>   
@endpush
</x-app-layout>

