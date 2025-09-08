<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'avatar',
        'direccion',
        'telefono',
        'ciudad',
        'fecha_nacimiento',
        'avatar'
    ];
}
