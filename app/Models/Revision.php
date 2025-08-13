<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $table = 'revisiones';

    protected $fillable = [
        'fecha',
        'descripcion',
        'user_id',
        'grupo_user_id',
        'actividad_id'
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grupoUser()
    {
        return $this->belongsTo(GrupoUser::class, 'grupo_user_id');
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
