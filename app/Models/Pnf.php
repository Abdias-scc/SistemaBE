<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pnf extends Model
{
    protected $table = 'pnf';
    protected $primaryKey = 'id_pnf';
    protected $fillable = [
        'id_pnf',
        'nombre_pnf',
        'id_estatus'
    ];
}
