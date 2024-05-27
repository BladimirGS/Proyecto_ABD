<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Grupos</h2>
    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 shadow-sm sm:rounded-lg mx-auto">
            <div class="bg-white md:flex md:justify-center p-10">
                <form class="md:w-3/4 lg:w-4/5" action="{{ route('grupos.update', ['grupo' => $grupo]) }}" method="POST">
                    @csrf
            
                    <legend class="block font-bold text-lg text-gray-700 text-center">Editar grupo</legend>
            
                    <div class="mt-5">
                        <x-input-label for="clave" value="clave" />
            
                        <x-text-input
                            id="clave"
                            type="text"
                            name="clave"
                            value="{{ $grupo->clave }}"
                            placeholder="Clave del grupo"
                        />
                        <x-input-error :messages="$errors->get('clave')" class="mt-2" />
                    </div>
            
                    <div class="mt-5">
                        <x-input-label for="semestre" value="semestre" />
            
                        <x-text-input
                            id="semestre"
                            type="number"
                            name="semestre"
                            value="{{ $grupo->semestre }}"
                            placeholder="Semestre del grupo"
                        />
                        <x-input-error :messages="$errors->get('semestre')" class="mt-2" />
                    </div>
            
                    <div class="mt-5">
                        <x-input-label for="user_id" value="Docente" />
        
                        <select name="user_id" id="user_id" class="selectUsers">
                            <option></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $grupo->user_id == $user->id ? 'selected' : '' }}>{{ $user->nombre }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>


                    <div class="mt-5">
                        <x-input-label for="carrera_id" value="Carrera" />
    
                        <select name="carrera_id" id="carrera_id" class="selectCarreras">
                            <option></option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}" {{ $grupo->carrera_id == $carrera->id ? 'selected' : '' }}>{{ $carrera->nombre }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('carrera_id')" class="mt-2" />
                    </div>


                    <div class="mt-5">
                        <x-input-label for="materia_id" value="Materia" />
    
                        <select name="materia_id" id="materia_id" class="selectMaterias">
                            <option></option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}" {{ $grupo->materia_id == $materia->id ? 'selected' : '' }}>{{ $materia->nombre }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('materia_id')" class="mt-2" />
                    </div>


                    <div class="mt-5">
                        <x-input-label for="periodo_id" value="Periodo" />
    
                        <select name="periodo_id" id="periodo_id" class="selectPeriodos">
                            <option></option>
                            @foreach ($periodos as $periodo)
                                <option value="{{ $periodo->id }}" {{ $grupo->periodo_id == $periodo->id ? 'selected' : '' }}>{{ $periodo->nombre }}</option>
                            @endforeach
                        </select>
                    
                        <x-input-error :messages="$errors->get('periodo_id')" class="mt-2" />
                    </div>

            
                    <div class="mt-5 text-center">
                        <x-button type="submit">
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
        $('.selectUsers').select2();

        $('.selectCarreras').select2();

        $('.selectMaterias').select2();
        
        $('.selectPeriodos').select2();
    })
</script>   
@endpush
</x-app-layout>

