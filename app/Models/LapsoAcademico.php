<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LapsoAcademico extends Model
{
    use HasFactory;

    protected $table = 'lapso_academico';
    protected $primaryKey = 'id_lapso_academico';

    public $timestamps = false; // Se desactiva si se necesita manejar created_at y updated_at
    protected $fillable = [
        'trayecto',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function condicionEstudiante()
    {
        return $this->hasMany(CondicionEstudiante::class, 'id_lapso_academico');
    }

}
