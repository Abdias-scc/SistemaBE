<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PersonaForanea extends Model
{
    use HasFactory;

    protected $table = 'persona_foranea';
    protected $primaryKey = 'id_persona_foranea';

    public $timestamps = false; // Se desactiva si se necesita manejar created_at y updated_at
    protected $guarded = ['id_persona_foranea']; // solo bloquea el id_persona_foranea
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
}
