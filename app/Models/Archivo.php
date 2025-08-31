<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'documento',
        'fecha',
        'user_id',
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

    protected static function booted()
    {
        static::deleting(function ($archivo) {
            if ($archivo->documento && Storage::exists($archivo->documento)) {
                Storage::delete($archivo->documento);

                // Ir borrando directorios vacíos hacia arriba
                $directorio = dirname($archivo->documento);

                while ($directorio !== 'archivos' && $directorio !== '.' && $directorio !== '/') {
                    if (empty(Storage::files($directorio)) && empty(Storage::directories($directorio))) {
                        Storage::deleteDirectory($directorio);
                        $directorio = dirname($directorio);
                    } else {
                        break; // si no está vacío, detenemos
                    }
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grupoUser()
    {
        return $this->belongsTo(GrupoUser::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
