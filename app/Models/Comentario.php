<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['comentario', 'grupo_id', 'actividad_id', 'fecha'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
    
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
