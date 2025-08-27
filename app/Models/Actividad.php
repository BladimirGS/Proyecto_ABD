<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = ['nombre', 'descripcion', 'fecha', 'firma', 'periodo_id'];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class);
    }
}
