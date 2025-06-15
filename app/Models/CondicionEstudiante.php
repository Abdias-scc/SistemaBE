<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CondicionEstudiante extends Model
{
    use HasFactory;

    protected $table = 'condicion_estudiante';
    protected $primaryKey = 'id_condicion_estudiante';

    public $timestamps = false; // Disable timestamps if not needed
    protected $guarded = ['id_condicion_estudiante']; // only block the id_condicion_estudiante

    public function personas()
    { 
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }

    public function lapsoAcademicos()
    {
        return $this->belongsTo(LapsoAcademico::class, 'id_lapso_academico');
    }
   
}