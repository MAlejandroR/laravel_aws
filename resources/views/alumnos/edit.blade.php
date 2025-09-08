@extends('layouts.app')

@section('content')
    @include('alumnos.form', ['alumno' => $alumno])
@endsection
