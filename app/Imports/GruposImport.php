<?php

namespace App\Imports;

use App\Models\Grupo;
use App\Models\User;
use App\Models\Periodo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GruposImport implements ToCollection, WithHeadingRow
{
    protected $periodo;
    protected $errores = [];

    public function __construct(?Periodo $periodo = null)
    {
        $this->periodo = $periodo;
    }

    public function collection(Collection $rows)
    {
        // 🔹 Validar que se haya pasado un periodo
        if (!$this->periodo) {
            $this->errores[] = "No se encontró un periodo activo para la importación.";
            throw new \Exception(json_encode($this->errores));
        }

        $fila = 2; // Fila de datos (1 es encabezado)

        foreach ($rows as $row) {
            $nombre = strtoupper(trim($row['nombre'] ?? ''));
            $apellido = strtoupper(trim($row['apellido'] ?? ''));
            $grupoClave = strtoupper(trim($row['grupo'] ?? ''));
            $materiaNombre = strtoupper(trim($row['materia'] ?? ''));

            // Saltar filas vacías
            if ($nombre === '' && $apellido === '' && $grupoClave === '' && $materiaNombre === '') {
                $fila++;
                continue;
            }

            // Validar que tenga ambos
            if ($nombre === '' || $apellido === '') {
                $this->errores[] = "Fila {$fila}: El docente no tiene nombre y/o apellido válidos.";
                $fila++;
                continue;
            }

            // Buscar usuario por nombre y apellido
            $usuario = User::whereRaw('UPPER(nombre) = ?', [$nombre])
                ->whereRaw('UPPER(apellido) = ?', [$apellido])
                ->first();

            $grupo = Grupo::whereRaw('UPPER(clave) = ?', [$grupoClave])
                ->whereHas('materia', function ($q) use ($materiaNombre) {
                    $q->whereRaw('UPPER(nombre) = ?', [$materiaNombre]);
                })
                ->first();

            if (!$usuario) {
                $this->errores[] = "Fila {$fila}: Usuario '{$nombre} {$apellido}' no encontrado.";
            }

            if (!$grupo) {
                $this->errores[] = "Fila {$fila}: Grupo '{$grupoClave}' con materia '{$materiaNombre}' no encontrado.";
            }

            if ($usuario && $grupo) {
                $grupoAsignado = DB::table('grupo_user')
                    ->where('grupo_id', $grupo->id)
                    ->where('periodo_id', $this->periodo->id)
                    ->exists();

                if ($grupoAsignado) {
                    $this->errores[] = "Fila {$fila}: El grupo '{$grupo->clave}' de la materia '{$grupo->materia->nombre}' ya está asignado a otro docente en este periodo.";
                } else {
                    $yaExiste = DB::table('grupo_user')
                        ->where('user_id', $usuario->id)
                        ->where('periodo_id', $this->periodo->id)
                        ->where('grupo_id', $grupo->id)
                        ->exists();

                    if ($yaExiste) {
                        $this->errores[] = "Fila {$fila}: El usuario '{$usuario->nombre}' ya está asignado al grupo '{$grupo->clave}' de la materia '{$grupo->materia->nombre}' en este periodo.";
                    }
                }
            }

            $fila++;
        }

        // Si hubo errores, detenemos todo
        if (count($this->errores)) {
            throw new \Exception(json_encode($this->errores));
        }

        // Segunda pasada para insertar
        $fila = 2;
        foreach ($rows as $row) {
            $grupoClave = strtoupper(trim($row['grupo'] ?? ''));
            $materiaNombre = strtoupper(trim($row['materia'] ?? ''));

            $nombre = strtoupper(trim($row['nombre'] ?? ''));
            $apellido = strtoupper(trim($row['apellido'] ?? ''));

            $usuario = User::whereRaw('UPPER(nombre) = ?', [$nombre])
                ->whereRaw('UPPER(apellido) = ?', [$apellido])
                ->first();

            $grupo = Grupo::whereRaw('UPPER(clave) = ?', [$grupoClave])
                ->whereHas('materia', function ($q) use ($materiaNombre) {
                    $q->whereRaw('UPPER(nombre) = ?', [$materiaNombre]);
                })
                ->first();

            DB::table('grupo_user')->insert([
                'grupo_id' => $grupo->id,
                'user_id' => $usuario->id,
                'periodo_id' => $this->periodo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $fila++;
        }
    }
}
