<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsuarioPermiso extends Model
{
    use HasFactory;
    
    protected $table = 'usuario_permiso';
    protected $primaryKey = 'id_usuario_permiso';

    public $timestamps = false; // Disable timestamps if not needed
    protected $fillable = [
        'id_usuario',
        'id_permiso',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'id_permiso');
    }
}
