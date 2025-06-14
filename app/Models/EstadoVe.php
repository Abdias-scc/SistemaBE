<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoVe extends Model
{
    use HasFactory;
    protected $table = "estado_ve";
    //Definir clave primaria
    protected $primaryKey = "id_estado_ve";
    public $timestamps = false; // Se activa si se necesita manejar created_at y updated_at
    protected $fillable = ['nombre_estado'];

    public function municipio()
    {
        return $this->hasMany(Municipio::class, 'id_estado_ve');
    }

}
