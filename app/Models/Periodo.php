<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function gruposUsuarios()
    {
        return $this->hasManyThrough(Grupo::class, 'grupo_user_periodo', 'periodo_id', 'id', 'id', 'grupo_id');
    }    
}
