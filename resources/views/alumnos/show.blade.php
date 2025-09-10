@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Cabecera -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Detalles del Alumno</h2>
                        <div class="space-x-2">
                            <a href="{{ route('alumnos.edit', $alumno) }}"
                               class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
                                Editar
                            </a>
                            <a href="{{ route('alumnos.index') }}"
                               class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                Volver
                            </a>
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Columna Izquierda: Foto -->
                        <div class="space-y-4">
                            <div class="h-48 w-48 mx-auto rounded-full bg-gray-200 overflow-hidden shadow-md">
                                @if($alumno->avatar ?? $alumno->foto)
                                    <img src="{{ asset('storage/avatars/' . ($alumno->avatar ?? $alumno->foto)) }}"
                                         alt="{{ $alumno->nombre }}"
                                         class="h-full w-full object-cover">
                                @else
                                    <div class="h-full w-full flex items-center justify-center text-gray-400">
                                        <svg class="h-20 w-20" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-semibold text-gray-800">
                                    {{ $alumno->nombre }} {{ $alumno->apellidos }}
                                </h3>
                                <p class="text-indigo-600">{{ $alumno->email }}</p>
                                @if($alumno->telefono)
                                    <p class="text-gray-600">{{ $alumno->telefono }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Columna Central: Contacto -->
                        <div class="space-y-4">
                            <h4 class="text-lg font-medium text-gray-900 border-b pb-2">Información de Contacto</h4>
                            <ul class="space-y-2 text-gray-700">
                                @if($alumno->direccion)
                                    <li><strong>Dirección:</strong> {{ $alumno->direccion }}</li>
                                @endif
                                @if($alumno->ciudad)
                                    <li><strong>Ciudad:</strong> {{ $alumno->ciudad }}</li>
                                @endif
                                @if($alumno->pais)
                                    <li><strong>País:</strong> {{ $alumno->pais }}</li>
                                @endif
                                @if($alumno->codigo_postal)
                                    <li><strong>Código Postal:</strong> {{ $alumno->codigo_postal }}</li>
                                @endif
                            </ul>
                        </div>

                        <!-- Columna Derecha: Notas -->
                        <div class="space-y-4">
                            <h4 class="text-lg font-medium text-gray-900 border-b pb-2">Notas</h4>
                            <p class="text-gray-700 whitespace-pre-line">
                                {{ $alumno->notas ?? 'Sin notas registradas' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
