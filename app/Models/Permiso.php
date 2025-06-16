<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permiso';
    protected $primaryKey = 'id_permiso';

    public $timestamps = false; // Disable timestamps if not needed
    protected $guarded = ['id_permiso']; // only block the id_permiso

    public function usuarios()
    {
        return $this->belongsToMany(Perfil::class, 'user_permiso', 'id_usuario', 'id_permiso');
    }
}
