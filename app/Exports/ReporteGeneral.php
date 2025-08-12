<?php

namespace App\Exports;

use App\Models\GrupoUser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class ReporteGeneral implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    private $periodoId;

    public function __construct($periodoId)
    {
        $this->periodoId = $periodoId;
    }

    public function collection()
    {
        return GrupoUser::query()
            ->join('users', 'grupo_user.user_id', '=', 'users.id')
            ->join('grupos', 'grupo_user.grupo_id', '=', 'grupos.id')
            ->leftJoin('materias', 'grupos.materia_id', '=', 'materias.id')
            ->leftJoin('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->join('actividades', function ($join) {
                $join->on('actividades.periodo_id', '=', 'grupo_user.periodo_id');
            })
            ->leftJoin('archivos', function ($join) {
                $join->on('archivos.actividad_id', '=', 'actividades.id')
                     ->on('archivos.grupo_user_id', '=', 'grupo_user.id');
            })
            ->where('grupo_user.periodo_id', $this->periodoId)
            ->select(
                'users.nombre as docente',
                'carreras.nombre as carrera',
                'grupos.clave as grupo',
                'materias.nombre as materia',
                DB::raw('COUNT(DISTINCT actividades.id) as actividades_totales'),
                DB::raw('SUM(CASE WHEN archivos.fecha IS NOT NULL AND archivos.fecha <= actividades.fecha THEN 1 ELSE 0 END) as entregadas_a_tiempo'),
                DB::raw('SUM(CASE WHEN archivos.fecha IS NOT NULL AND archivos.fecha > actividades.fecha THEN 1 ELSE 0 END) as entregadas_fuera_tiempo'),
                DB::raw('(COUNT(DISTINCT actividades.id) - SUM(CASE WHEN archivos.fecha IS NOT NULL THEN 1 ELSE 0 END)) as no_entregadas')
            )
            ->groupBy('users.nombre', 'carreras.nombre', 'grupos.clave', 'materias.nombre')
            ->orderBy('users.nombre')
            ->orderBy('carreras.nombre')
            ->orderBy('grupos.clave')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Docente',
            'Carrera',
            'Grupo',
            'Materia',
            'Actividades Totales',
            'Entregadas a Tiempo',
            'Entregadas Fuera de Tiempo',
            'No Entregadas',
        ];
    }

    public function map($row): array
    {
        return [
            $row->docente,
            $row->carrera,
            $row->grupo,
            $row->materia,
            $row->actividades_totales,
            $row->entregadas_a_tiempo,
            $row->entregadas_fuera_tiempo,
            $row->no_entregadas,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);

        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }
}
