<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PersonaPnf;

class Persona extends Model
{
    use HasFactory;


    public $timestamps = false; // Disable timestamps if not needed
    protected $table = "persona";
    //Definir clave primaria
    protected $primaryKey = "id_persona";
    
    protected $guarded = ['id_persona']; // solo bloquea el id_persona

    public function personaPnfs()
    {
        return $this->hasMany(PersonaPnf::class, 'id_persona');
    }

    public function personaForanea()
    {
        return $this->hasOne(PersonaForanea::class, 'id_persona');
    }

    public function becaSoli()
    {
        return $this->hasMany(BecaSoli::class, 'id_persona');
    }

    public function direccion()
    {
        return $this->hasMany(Direccion::class, 'id_persona');
    }
}
