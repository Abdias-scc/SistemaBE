<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sede extends Model
{
    use HasFactory;
    protected $table = "sede";
    // Definir clave primaria
    protected $primaryKey = "id_sede";
    public $timestamps = false; // Se activa si se necesita manejar created_at y updated_at
    protected $fillable = [
        'nombre_sede',
        'id_estado_ve',
    ];

    public function estadoVe()
    {
        return $this->belongsTo(EstadoVe::class, 'id_estado_ve');
    }

  
}
