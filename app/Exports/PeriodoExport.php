<?php

namespace App\Exports;

use App\Models\Periodo;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeriodoExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Periodo::query()
            ->join('grupos', 'periodos.id', '=', 'grupos.periodo_id')
            ->join('users', 'grupos.user_id', '=', 'users.id')
            ->join('archivos', 'grupos.id', '=', 'archivos.grupo_id')
            ->select('users.nombre as usuario_nombre', 'archivos.nombre as nombre_archivo', 'archivos.fecha as fecha_subida', 'periodos.nombre as nombre_periodo');
    }

    public function headings(): array
    {
        return [
            'Usuario Nombre',
            'Nombre Documento',
            'Fecha Subida',
            'Nombre Periodo',
        ];
    }
}
