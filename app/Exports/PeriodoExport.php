<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\GrupoUser;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PeriodoExport implements FromQuery, WithHeadings, WithMapping, WithStyles
{
    private $periodoId;

    public function __construct($periodoId)
    {
        $this->periodoId = $periodoId;
    }

    public function query()
    {
        return GrupoUser::query()
            ->join('grupos', 'grupo_user.grupo_id', '=', 'grupos.id')
            ->join('users', 'grupo_user.user_id', '=', 'users.id')
            ->leftJoin('materias', 'grupos.materia_id', '=', 'materias.id')
            ->leftJoin('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            // Actividades del mismo periodo que el grupo_user
            ->join('actividades', function ($join) {
                $join->on('actividades.periodo_id', '=', 'grupo_user.periodo_id');
            })
            // Archivos subidos por ese grupo_user para esa actividad
            ->leftJoin('archivos', function ($join) {
                $join->on('archivos.actividad_id', '=', 'actividades.id')
                    ->on('archivos.grupo_user_id', '=', 'grupo_user.id');
            })
            ->select(
                'users.nombre as docente',
                'carreras.nombre as carrera',
                'grupos.clave as grupo',
                'materias.nombre as materia',
                'actividades.nombre as actividad',
                'archivos.fecha as fecha_subido',
                'actividades.fecha as fecha_limite',
                'actividades.created_at as actividad_creada'
            )
            ->where('grupo_user.periodo_id', $this->periodoId)
            // Orden jerárquico
            ->orderBy('docente')
            ->orderBy('carrera')
            ->orderBy('grupo')
            ->orderBy('actividad_creada');
    }

    public function headings(): array
    {
        return [
            'Docente',
            'Carrera',
            'Grupo',
            'Materia',
            'Actividad',
            'Fecha Subido',
            'Fecha Límite',
        ];
    }

    public function map($row): array
    {
        return [
            $row->docente,
            $row->carrera,
            $row->grupo,
            $row->materia,
            $row->actividad,
            $row->fecha_subido
                ? Carbon::parse($row->fecha_subido)->format('d/m/Y')
                : 'No Subida',
            Carbon::parse($row->fecha_limite)->format('d/m/Y'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Negritas encabezados
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A:G')->getAlignment()->setWrapText(true);

        // Formato fecha/hora en columnas F y G
        $sheet->getStyle('F:G')->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_DATE_DATETIME);

        // Anchos
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);

        $sheet->getRowDimension(1)->setRowHeight(30);
        $sheet->getDefaultRowDimension()->setRowHeight(20);
    }
}
