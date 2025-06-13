<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pnf extends Model
{
    protected $table = 'pnf';
    protected $fillable = [
        'nombre_pnf',
        'id_estatus'
    ];
}
