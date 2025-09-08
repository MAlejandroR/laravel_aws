@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Detalles del Alumno</h2>
                        <div class="space-x-2">
                            <a href="{{ route('alumnos.edit', $alumno) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
                                Editar
                            </a>
                            <a href="{{ route('alumnos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                                Volver
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="space-y-4">
                            <div class="h-48 w-48 mx-auto rounded-full bg-gray-200 overflow-hidden">
                                @if($alumno->foto)
                                    <img src="{{ asset('storage/' . $alumno->foto) }}" alt="{{ $alumno->nombre }}" class="h-full w-full object-cover">
                                @else
                                    <div class="h-full w-full flex items-center justify-center text-gray-
