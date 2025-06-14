<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicioCo extends Model
{
    use HasFactory;
    
    protected $table = 'servicio_co';
    protected $primaryKey = 'id_servicio_co';

    public $timestamps = true; // Disable timestamps if not needed
    protected $guarded = ['id_servicio_co']; // only block the id_servicio_co

    public function horarioCo()
    {
        return $this->hasMany(HorarioCo::class, 'id_servicio_co');  
    }
}
