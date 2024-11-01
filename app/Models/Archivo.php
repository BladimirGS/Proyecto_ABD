<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre', 
        'documento',
        'fecha',
        'grupo_id',
        'actividad_id'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
    
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
