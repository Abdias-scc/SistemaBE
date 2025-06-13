<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable timestamps if not needed
    protected $table = "persona";
    //Definir clave primaria
    protected $primaryKey = 'cedula_persona';

    protected $fillable = [
        'nombre_persona',
        'apellido_persona',
        'cedula_persona',
        'telefono_persona',
        'email_persona',
        'fecha_nacimiento_persona'
    ];

}
