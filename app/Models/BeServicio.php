<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BeServicio extends Model
{
    use HasFactory;

    protected $table = 'be_servicio';
    protected $primaryKey = 'id_be_servicio';

    public $timestamps = false; // Disable timestamps if not needed
    protected $guarded = ['id_be_servicio']; // only block the id_be_servicio

    public function jornadaBeca()
    {
        return $this->hasMany(JornadaBeca::class, 'id_be_servicio');

    }
    
    public function servicioCo()
    {
        return $this->hasMany(ServicioCo::class, 'id_be_servicio');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'id_estatus');
    }
  
}
