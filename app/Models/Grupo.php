<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'clave',
        'semestre',
        'user_id',
        'carrera_id',
        'materia_id',
        'periodo_id',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'actividad_grupo', 'actividad_id', 'grupo_id');
    }
}
