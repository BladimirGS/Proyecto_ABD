<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = ['nombre', 'descripcion', 'fecha', 'periodo_id'];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class);
    }
}
