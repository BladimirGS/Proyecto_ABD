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
        'grupo_user_id',
        'actividad_id',
        'estado'
    ];

    public function grupoUser()
    {
        return $this->belongsTo(GrupoUser::class, 'grupo_user_id');
    }
    
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
