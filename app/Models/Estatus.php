<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estatus extends Model
{
    use HasFactory;

    protected $table = 'estatus';
    protected $primaryKey = 'id_estatus';

    public $timestamps = false; // Disable timestamps if not needed
    protected $fillable = [
        'nombre',
        
    ];

    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_estatus');
    }

    
}
