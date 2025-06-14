<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class JornadaBeca extends Model
{
    use HasFactory;

    protected $table = 'jornada_beca';
    protected $primaryKey = 'id_jornada_beca';

    public $timestamps = true; // Disable timestamps if not needed
    protected $guarded = ['id_jornada_beca']; // only block the id_jornada_beca
 
  
    public function becaSoli()
    {
        return $this->belongsTo(BecaSoli::class, 'id_jornada_beca');
    }
}
