<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisDiarioComedor extends Model
{
    use HasFactory;

    protected $table = 'regis_diario_comedor';
    protected $primaryKey = 'id_regis_diario_comedor';

    public $timestamps = false; // Disable timestamps if not needed
    protected $guarded = ['id_regis_diario_comedor']; // only block the id_regis_diario_comedor

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
    public function servicioComedor()
    {
        return $this->belongsTo(ServicioCo::class, 'id_servicio_comedor');
    }
}
