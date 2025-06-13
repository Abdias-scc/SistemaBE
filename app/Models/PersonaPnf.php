<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaPnf extends Model
{
    public function pnf()
    {
        return $this->belongsTo(Pnf::class, 'id_pnf', 'id_pnf');
    }

    public function persona()
    {
        return $this->belongsToMany(Persona::class, 'persona_pnf', 'id_persona_pnf', 'id_persona');
    }

    protected $table = "persona_pnf";
    protected $primaryKey = 'id_persona_pnf';
    protected $fillable = [
        'id_persona_pnf',
        'id_persona',
        'id_pnf',
        'fecha_inicio',
        'fecha_fin'
    ];

    protected $hidden = [
        'fecha_inicio',
        'fecha_fin'
    ];
}
