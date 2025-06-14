<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PersonaPnf extends Model
{
    use HasFactory;

    protected $table = 'persona_pnf';
    protected $primaryKey = 'id_persona_pnf';

    public $timestamps = false; // Se desactiva si se necesita manejar created_at y updated_at
    protected $fillable = [
        'id_persona',
        'id_pnf',
    ];

}
