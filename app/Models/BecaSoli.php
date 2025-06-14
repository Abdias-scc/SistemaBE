<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BecaSoli extends Model
{
    use HasFactory;
    
    protected $table = 'beca_soli';
    protected $primaryKey = 'id_beca_soli';

    public $timestamps = false; // Enable timestamps if needed
    protected $guarded = ['id_beca_soli']; // only block the id_beca_soli



    public function becaPregunta()
    {
        return $this->hasMany(BecaPregunta::class, 'id_beca_soli');
    }

    public function becaRespuesta()
    {
        return $this->hasMany(BecaRespuesta::class, 'id_beca_soli');
    }
}
