@props(['alumno' => null])

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                    {{ $alumno ? 'Editar Alumno' : 'Nuevo Alumno' }}
                </h2>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                         role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ $alumno ? route('alumnos.update', $alumno) : route('alumnos.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    @if($alumno)
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <!-- Avatar -->
                            <div x-data="{ preview: null }">
                                <label class="block text-sm font-medium text-gray-700">Foto</label>
                                <div class="mt-1 flex items-center">
        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
            <template x-if="preview">
                <img :src="preview" alt="Preview" class="h-full w-full object-cover">
            </template>
            <template x-if="!preview">
                @if($alumno && $alumno->avatar)
                    <img src="{{ asset('storage/' . $alumno->avatar) }}"
                         alt="{{ $alumno->nombre }}"
                         class="h-full w-full object-cover">
                @else
                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                @endif
            </template>
        </span>
                                    <input type="file" name="avatar" class="ml-5"
                                           @change="preview = $event.target.files.length ? URL.createObjectURL($event.target.files[0]) : null">
                                </div>
                            </div>

                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre *</label>
                                <input type="text" name="nombre" id="nombre"
                                       value="{{ old('nombre', $alumno->nombre ?? '') }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <!-- Apellidos -->
                            <div>
                                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos
                                    *</label>
                                <input type="text" name="apellidos" id="apellidos"
                                       value="{{ old('apellidos', $alumno->apellidos ?? '') }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                                <input type="email" name="email" id="email"
                                       value="{{ old('email', $alumno->email ?? '') }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                                <input type="text" name="telefono" id="telefono"
                                       value="{{ old('telefono', $alumno->telefono ?? '') }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- Dirección -->
                            <div>
                                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                                <input type="text" name="direccion" id="direccion"
                                       value="{{ old('direccion', $alumno->direccion ?? '') }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <!-- Ciudad -->
                            <div>
                                <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
                                <input type="text" name="ciudad" id="ciudad"
                                       value="{{ old('ciudad', $alumno->ciudad ?? '') }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <!-- País -->
                            <div>
                                <label for="pais" class="block text-sm font-medium text-gray-700">País</label>
                                <input type="text" name="pais" id="pais" value="{{ old('pais', $alumno->pais ?? '') }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <!-- Código Postal -->
                            <div>
                                <label for="codigo_postal" class="block text-sm font-medium text-gray-700">Código
                                    Postal</label>
                                <input type="text" name="codigo_postal" id="codigo_postal"
                                       value="{{ old('codigo_postal', $alumno->codigo_postal ?? '') }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>
                    </div>

                    <!-- Notas -->
                    <div class="mt-6">
                        <label for="notas" class="block text-sm font-medium text-gray-700">Notas</label>
                        <textarea name="notas" id="notas" rows="3"
                                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('notas', $alumno->notas ?? '') }}</textarea>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('alumnos.index') }}"
                           class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ $alumno ? 'Actualizar' : 'Guardar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
