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
        'carrera_id',
        'materia_id',
        'color',
    ];

    /**
     * Genera un color HSL consistente y agradable para el grupo.
     */
    public static function generarColor(string $clave, int $id): string
    {
        // Si existe el id, lo usamos para garantizar unicidad
        $input = $id ? $clave . $id : $clave;

        // Hashear
        $hash = crc32($input);

        // Tono (0–360)
        $hue = $hash % 360;

        // Saturación y luminosidad fijas (colores bonitos)
        $saturation = 65;
        $lightness  = 55;

        return "hsl($hue, {$saturation}%, {$lightness}%)";
    }

    public function gruposUser()
    {
        return $this->hasMany(GrupoUser::class);
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
        return $this->belongsToMany(Actividad::class);
    }
}
