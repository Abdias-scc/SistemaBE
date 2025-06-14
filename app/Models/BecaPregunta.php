<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  

class BecaPregunta extends Model
{
    use HasFactory;

    protected $table = 'beca_pregunta';
    protected $primaryKey = 'id_beca_pregunta';

    public $timestamps = false; // Disable timestamps if not needed
    protected $guarded = ['id_beca_pregunta']; // only block the id_beca_pregunta
    public function becaRespuesta()
    {
        return $this->hasMany(BecaRespuesta::class, 'id_beca_pregunta');
    }
}
