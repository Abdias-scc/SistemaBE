<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "direccion";

    protected $primaryKey = 'id_direccion';
    protected $fillable = [
        'id_direccion',
        'sector',
        'calle',
        'id_persona',
        'id_municipio'
    ];
}
