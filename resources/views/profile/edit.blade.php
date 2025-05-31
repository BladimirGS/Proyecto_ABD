<x-app-layout>
    <div class="bg-white mx-auto max-w-2xl p-10">
        
        <h2 class="block font-bold text-lg text-gray-700 text-center">Editar perfil</h2>
        
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="nombre" value="Nombre" />
        
                    <x-text-input
                        id="nombre"
                        type="text"
                        name="nombre"
                        value="{{ old('nombre', $usuario->nombre) }}"
                        placeholder="Nombre del usuario"
                        :readonly="$usuario->nombre === 'Super Usuario'"
                    />  
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="apellido" value="Apellido" />
        
                    <x-text-input
                        id="apellido"
                        type="text"
                        name="apellido"
                        value="{{ old('apellido', $usuario->apellido) }}"
                        placeholder="Apellido del usuario"
                    />
                    <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="genero" value="Género" />
                    <select
                        id="genero"
                        name="genero"
                        class="block w-full h-10 mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    >
                        <option value="" disabled {{ old('genero', $usuario->genero) ? '' : 'selected' }}>Género del usuario</option>
                        <option value="Hombre" {{ old('genero', $usuario->genero) == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                        <option value="Mujer" {{ old('genero', $usuario->genero) == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                        <option value="Otro" {{ old('genero', $usuario->genero) == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="edad" value="Edad" />
        
                    <x-text-input
                        id="edad"
                        type="number"
                        name="edad"
                        value="{{ old('edad', $usuario->edad) }}"
                        placeholder="Edad del usuario"
                    />
                    <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="rfc" value="RFC" />
        
                    <x-text-input
                        id="rfc"
                        type="text"
                        name="rfc"
                        value="{{ old('rfc', $usuario->rfc) }}"
                        placeholder="RFC del usuario"
                    />
                    <x-input-error :messages="$errors->get('rfc')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="grado_estudio" value="Último grado de estudio" />
                    <select
                        id="grado_estudio"
                        name="grado_estudio"
                        class="block w-full h-10 mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    >
                        <option value="" disabled {{ old('genero', $usuario->genero) ? '' : 'selected' }}>Último grado de estudio</option>
                        <option value="Primaria" {{ old('grado_estudio', $usuario->grado_estudio) == 'Primaria' ? 'selected' : '' }}>Primaria</option>
                        <option value="Secundaria" {{ old('grado_estudio', $usuario->grado_estudio) == 'Secundaria' ? 'selected' : '' }}>Secundaria</option>
                        <option value="Bachillerato" {{ old('grado_estudio', $usuario->grado_estudio) == 'Bachillerato' ? 'selected' : '' }}>Bachillerato</option>
                        <option value="Licenciatura" {{ old('grado_estudio', $usuario->grado_estudio) == 'Licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                        <option value="Maestría" {{ old('grado_estudio', $usuario->grado_estudio) == 'Maestría' ? 'selected' : '' }}>Maestría</option>
                        <option value="Doctorado" {{ old('grado_estudio', $usuario->grado_estudio) == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                        <option value="Otro" {{ old('grado_estudio', $usuario->grado_estudio) == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    <x-input-error :messages="$errors->get('grado_estudio')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="telefono" value="Teléfono" />
        
                    <x-text-input
                        id="telefono"
                        type="text"
                        name="telefono"
                        value="{{ old('telefono', $usuario->telefono) }}"
                        placeholder="Teléfono del usuario"
                    />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="placa_vehicular" value="Placa Vehicular" />
        
                    <x-text-input
                        id="placa_vehicular"
                        type="text"
                        name="placa_vehicular"
                        value="{{ old('placa_vehicular', $usuario->placa_vehicular) }}"
                        placeholder="Placa Vehicular del usuario"
                    />
                    <x-input-error :messages="$errors->get('placa_vehicular')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="email" value="Correo" />
        
                    <x-text-input
                        id="email"
                        type="text"
                        name="email"
                        value="{{ old('email', $usuario->email) }}"
                        placeholder="Correo del usuario"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="mt-5">
                    <x-input-label for="password" value="Contraseña" />
        
                    <x-text-input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Contraseña del usuario"
                        autocomplete="new-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>
            
            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                <x-link href="{{ route('docentes.index') }}" color="red"  class="w-full md:w-auto">
                    Cancelar
                </x-link>
                
                <x-button type="submit" class="w-full md:w-auto">
                    Guardar cambios
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
