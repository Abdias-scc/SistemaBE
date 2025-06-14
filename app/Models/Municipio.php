<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = "municipio";
    // Definir clave primaria
    protected $primaryKey = "id_municipio";
    public $timestamps = false; // Se activa si se necesita manejar created_at y updated_at
    protected $fillable = ['nombre_municipio', 'id_estado_ve'];
}
