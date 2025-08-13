<x-app-layout>
    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 shadow-sm sm:rounded-lg mx-auto">
            <div class="bg-white md:flex md:justify-center p-10">
                <form class="md:w-3/4 lg:w-4/5" action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    <h2 class="block font-bold text-lg text-gray-700 text-center uppercase">Registrar rol</h2>

                    <div class="mt-5">
                        <x-input-label for="nombre" value="Nombre" class="uppercase" />

                        <x-text-input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}"
                            placeholder="Nombre del rol" class="uppercase" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <div class="mt-5">
                        <x-input-label for="descripcion" value="Descripción" class="uppercase" />

                        <x-text-area id="descripcion" name="descripcion" placeholder="DESCRIPCION DEL ROL" rows="4">{{
                            old('descripcion') }}</x-text-area>

                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                    </div>

                    <div class="mt-5">
                        <span for="permissions" class="block font-medium text-sm text-gray-700 uppercase">Lista de
                            permisos</span>

                        <x-input-error :messages="$errors->get('permisos')" class="mt-2" />

                        @foreach ($permissions as $permission)
                        <div class="flex items-center mt-2">
                            <input type="checkbox" id="permission{{ $permission->id }}" value="{{ $permission->id }}"
                                name="permisos[]"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="permission{{ $permission->id }}" class="ml-2 text-gray-700">{{
                                $permission->description }}</label>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                        <x-link href="{{ route('roles.index') }}" color="red" class="w-full md:w-auto">
                            Cancelar
                        </x-link>

                        <x-button type="submit" class="w-full md:w-auto">
                            Registrar role
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>