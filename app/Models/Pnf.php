<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pnf extends Model
{
    protected $table = 'pnf';
    protected $primaryKey = 'id_pnf';

    public $timestamps = true; // Se desactiva si se necesita manejar created_at y updated_at
    protected $fillable = [
        'nombre_pnf',
        'id_estatus'
    ];
    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'persona_pnf', 'id_pnf', 'id_persona');
    }
    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'id_estatus');
    }
}
