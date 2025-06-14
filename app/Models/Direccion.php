<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "direccion";

    protected $primaryKey = 'id_direccion';

    public $timestamps = false; // Se activa si se necesita manejar created_at y updated_at
    protected $fillable = [
        'id_persona',
        'sector',
        'calle',
        'id_persona',
        'id_municipio'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }
}
