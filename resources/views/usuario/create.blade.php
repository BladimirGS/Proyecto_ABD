<x-app-layout>
    <div class="bg-white mx-auto max-w-2xl p-10">
        
        <legend class="block font-bold text-lg text-gray-700 text-center">Registrar Usuario</legend>
        
        <form >
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="nombre" value="Nombre" />
        
                    <x-text-input
                        id="nombre"
                        type="text"
                        wire:model="nombre"
                        :value="old('nombre')"
                        placeholder="Nombre del usuario"
                    />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="apellido" value="Apellido" />
        
                    <x-text-input
                        id="apellido"
                        type="text"
                        wire:model="apellido"
                        :value="old('apellido')"
                        placeholder="Apellido del usuario"
                    />
                    <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="sexo" value="Sexo" />
                    <select
                        id="sexo"
                        wire:model="sexo"
                        class="block w-full h-10 mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"

                    >
                        <option>Sexo del usuario</option>
                        @foreach ($contratos as $contrato)
                            <option value="Planta">{{ $contrato->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('sexo')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="edad" value="Edad" />
        
                    <x-text-input
                        id="edad"
                        type="text"
                        wire:model="edad"
                        :value="old('edad')"
                        placeholder="Edad del usuario"
                    />
                    <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="tipo" value="Tipo de contrato" />
                    <select
                        id="tipo"
                        wire:model="tipo"
                        class="block w-full h-10 mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    >
                        <option>Seleccione el tipo de contrato</option>
                        @foreach ($contratos as $contrato)
                            <option value="Planta">{{ $contrato->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="rfc" value="RFC" />
        
                    <x-text-input
                        id="rfc"
                        type="text"
                        wire:model="rfc"
                        :value="old('rfc')"
                        placeholder="RFC del usuario"
                    />
                    <x-input-error :messages="$errors->get('rfc')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="clave" value="Clave Presupuestal" />
        
                    <x-text-input
                        id="clave"
                        type="text"
                        wire:model="clave"
                        :value="old('clave')"
                        placeholder="Clave Presupuestal del usuario"
                    />
                    <x-input-error :messages="$errors->get('clave')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="estudio" value="Último Grado de Estudio" />
        
                    <x-text-input
                        id="estudio"
                        type="text"
                        wire:model="estudio"
                        :value="old('estudio')"
                        placeholder="Último Grado de Estudio"
                    />
                    <x-input-error :messages="$errors->get('estudio')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="telefono" value="Teléfono" />
        
                    <x-text-input
                        id="telefono"
                        type="text"
                        wire:model="telefono"
                        :value="old('telefono')"
                        placeholder="Teléfono del usuario"
                    />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="placa" value="Placa Vehicular" />
        
                    <x-text-input
                        id="placa"
                        type="text"
                        wire:model="placa"
                        :value="old('placa')"
                        placeholder="Placa Vehicular del usuario"
                    />
                    <x-input-error :messages="$errors->get('placa')" class="mt-2" />
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mt-5">
                    <x-input-label for="email" value="Correo" />
        
                    <x-text-input
                        id="email"
                        type="text"
                        wire:model="email"
                        :value="old('email')"
                        placeholder="Correo del usuario"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="mt-5">
                    <x-input-label for="password" value="Contraseña" />
        
                    <x-text-input
                        id="password"
                        type="password"
                        wire:model="password"
                        :value="old('password')"
                        placeholder="Contraseña del usuario"
                        autocomplete="new-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>
            
            <div class="mt-5 text-center">
                <x-button type="submit">
                    Registrar Usuario
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>