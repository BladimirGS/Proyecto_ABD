<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['comentario', 'grupo_user_id', 'actividad_id', 'fecha'];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function grupoUser()
    {
        return $this->belongsTo(GrupoUser::class, 'grupo_user_id');
    }
}

