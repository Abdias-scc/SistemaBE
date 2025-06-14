<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorarioCo extends Model
{
    use HasFactory;

    protected $table = 'horario_co';
    protected $primaryKey = 'id_horario_co';

    public $timestamps = false; // Disable timestamps if not needed
    protected $guarded = ['id_horario_co']; // only block the id_horario_co

    public function servicioCo()
    {
        return $this->belongsTo(ServicioCo::class, 'id_servicio_co');
    }
}
