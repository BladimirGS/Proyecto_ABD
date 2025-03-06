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
        // Aquí modificamos la consulta para incluir la tabla intermedia 'actividad_grupo' y los archivos
        return Periodo::query()
            ->join('grupos', 'periodos.id', '=', 'grupos.periodo_id')
            ->join('users', 'grupos.user_id', '=', 'users.id')
            ->join('materias', 'grupos.materia_id', '=', 'materias.id')
            ->join('carreras', 'grupos.carrera_id', '=', 'carreras.id')
            ->join('actividad_grupo', 'grupos.id', '=', 'actividad_grupo.grupo_id') // Relación con tabla intermedia
            ->join('actividades', 'actividad_grupo.actividad_id', '=', 'actividades.id') // Relación con actividades
            ->leftJoin('archivos', 'actividades.id', '=', 'archivos.actividad_id') // Archivos asociados (left join para incluir tareas no subidas)
            ->select(
                'users.nombre as usuario_nombre', 
                'carreras.nombre as nombre_carrera',
                'materias.nombre as nombre_materia',
                'grupos.clave as grupo_nombre',
                'actividades.nombre as nombre_actividad',
                'archivos.fecha as fecha_subida', 
                'actividades.fecha as fecha_limite'
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
            $row->fecha_subida ?: 'No Subida', // Si no hay fecha de subida, mostramos "No Subida"
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
