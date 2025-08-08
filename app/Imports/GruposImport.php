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

    public function __construct(Periodo $periodo)
    {
        $this->periodo = $periodo;
    }

    public function collection(Collection $rows)
    {
        $fila = 2; // Fila de datos (1 es encabezado)

        foreach ($rows as $row) {
            $docente = strtoupper(trim($row['docente'] ?? ''));
            $grupoClave = strtoupper(trim($row['grupo'] ?? ''));
            $materiaNombre = strtoupper(trim($row['materia'] ?? ''));

            // Saltar filas completamente vacías
            if ($docente === '' && $grupoClave === '' && $materiaNombre === '') {
                $fila++;
                continue;
            }

            $usuario = User::whereRaw('UPPER(nombre) = ?', [$docente])->first();

            $grupo = Grupo::whereRaw('UPPER(clave) = ?', [$grupoClave])
                ->whereHas('materia', function ($q) use ($materiaNombre) {
                    $q->whereRaw('UPPER(nombre) = ?', [$materiaNombre]);
                })
                ->first();

            if (!$usuario) {
                $this->errores[] = "Fila {$fila}: Usuario '{$docente}' no encontrado.";
            }

            if (!$grupo) {
                $this->errores[] = "Fila {$fila}: Grupo '{$grupoClave}' con materia '{$materiaNombre}' no encontrado.";
            }

            if ($usuario && $grupo) {
                // Evita asignar el mismo grupo a varios usuarios en un mismo periodo
                $grupoAsignado = DB::table('grupo_user')
                    ->where('grupo_id', $grupo->id)
                    ->where('periodo_id', $this->periodo->id)
                    ->exists();

                if ($grupoAsignado) {
                    $this->errores[] = "Fila {$fila}: El grupo '{$grupo->clave}' de la materia '{$grupo->materia->nombre}' ya está asignado a otro docente en este periodo.";
                } else {
                    // Solo validar si es el mismo usuario cuando el grupo aún no está tomado por otro
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
            $docente = strtoupper(trim($row['docente'] ?? ''));
            $grupoClave = strtoupper(trim($row['grupo'] ?? ''));
            $materiaNombre = strtoupper(trim($row['materia'] ?? ''));

            if ($docente === '' && $grupoClave === '' && $materiaNombre === '') {
                $fila++;
                continue;
            }

            $usuario = User::whereRaw('UPPER(nombre) = ?', [$docente])->first();

            $grupo = Grupo::whereRaw('UPPER(clave) = ?', [$grupoClave])
                ->whereHas('materia', function ($q) use ($materiaNombre) {
                    $q->whereRaw('UPPER(nombre) = ?', [$materiaNombre]);
                })
                ->first();

            // Aquí también guardamos todo en mayúsculas (por si hay columnas adicionales)
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
