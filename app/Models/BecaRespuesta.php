<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BecaRespuesta extends Model
{
    use HasFactory;

    protected $table = 'beca_respuesta';
    protected $primaryKey = 'id_beca_respuesta';

    public $timestamps = false; // Disable timestamps if not needed
    protected $guarded = ['id_beca_respuesta']; // only block the id_beca_respuesta

    public function becaPregunta()
    {
        return $this->belongsTo(BecaPregunta::class, 'id_beca_pregunta');
    }
    
    public function becaSoli()
    {
        return $this->belongsTo(BecaSoli::class, 'id_beca_soli');
    }
}
