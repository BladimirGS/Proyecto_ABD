<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoUser extends Model
{
    protected $table = 'grupo_user';

    protected $fillable = ['grupo_id', 'user_id', 'periodo_id'];

    protected static function booted()
    {
        static::deleting(function ($grupoUser) {
            foreach ($grupoUser->archivos as $archivo) {
                $archivo->delete(); // dispara deleting de Archivo
            }
        });
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
