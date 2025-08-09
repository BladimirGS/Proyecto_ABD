<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'documento',
        'fecha',
        'grupo_user_id',
        'actividad_id',
        'estado'
    ];

    protected function fecha(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::parse($value) : null,
        );
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
