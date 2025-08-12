<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['comentario', 'fecha', 'user_id', 'grupo_user_id', 'actividad_id'];


    protected function fecha(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::parse($value) : null,
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function grupoUser()
    {
        return $this->belongsTo(GrupoUser::class, 'grupo_user_id');
    }
}
