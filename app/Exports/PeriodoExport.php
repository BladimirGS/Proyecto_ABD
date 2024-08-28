<?php

namespace App\Exports;

use App\Models\Periodo;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
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
        return Periodo::query()
            ->join('grupos', 'periodos.id', '=', 'grupos.periodo_id')
            ->join('users', 'grupos.user_id', '=', 'users.id')
            ->join('materias', 'grupos.materia_id', '=', 'materias.id')
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->join('archivos', 'grupos.id', '=', 'archivos.grupo_id')
            ->join('activities', 'archivos.activity_id', '=', 'activities.id')
            ->select(
                'users.nombre as usuario_nombre', 
                'carreras.nombre as nombre_carrera',
                'materias.nombre as nombre_materia',
                'grupos.clave as grupo_nombre',
                'activities.nombre as nombre_actividad',
                'archivos.fecha as fecha_subida', 
                'activities.fecha as fecha_limite'
            )
            ->where('periodos.id', $this->periodoId);
    }

    public function headings(): array
    {
        return [
            'Usuario Nombre',
            'Nombre Carrera',
            'Nombre Materia',
            'Nombre Grupo',
            'Nombre Actividad',
            'Fecha Subida',
            'Fecha Límite',
        ];
    }

    public function map($row): array
    {
        return [
            $row->usuario_nombre,
            $row->nombre_carrera,
            $row->nombre_materia,
            $row->grupo_nombre,
            $row->nombre_actividad,
            $row->fecha_subida,
            $row->fecha_limite,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:G1')->getFont()->setBold(true); // Aplica negritas a los encabezados
        $sheet->getStyle('A:G')->getAlignment()->setWrapText(true); // Centra las columnas A, B, C, D, E, F, G

        // Ajustar el ancho de las columnas
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);

        // Ajustar la altura de las filas
        $sheet->getRowDimension(1)->setRowHeight(30); // Altura de la fila de encabezados
        $sheet->getDefaultRowDimension()->setRowHeight(20); // Altura predeterminada para otras filas
    }
}