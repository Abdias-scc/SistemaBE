<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';

    public $timestamps = false; // Se desactiva si se necesita manejar created_at y updated_at
    protected $guarded = ['id_perfil']; // solo bloquea el id_perfil

    public function personas()
    {
        return $this->hasMany(Persona::class, 'id_perfil');
    }

    
}
