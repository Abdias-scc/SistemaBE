<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PersonaPnf;

class Persona extends Model
{
    use HasFactory;

    //funcion de union de tablas

    public function personaPnf()
    {
        return $this->belongsToMany(PersonaPnf::class, 'persona_pnf', 'id_persona', 'id_persona_pnf');
    }

    public $timestamps = false; // Disable timestamps if not needed
    protected $table = "persona";
    //Definir clave primaria
    protected $primaryKey = "id_persona";
    protected $fillable = [
        'id_persona',
        'nombre_persona',
        'apellido_persona',
        'cedula_persona',
        'telefono_persona',
        'email_persona',
        'fecha_nacimiento_persona',
        'regis_patria'
    ];

}
