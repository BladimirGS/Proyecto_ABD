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
        $query = GrupoUser::query()
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
                DB::raw("IFNULL(COUNT(DISTINCT CASE 
                WHEN archivos.user_id = grupo_user.user_id 
                AND archivos.fecha <= actividades.fecha 
                THEN actividades.id END), 0) as entregadas_a_tiempo"),
                DB::raw("IFNULL(COUNT(DISTINCT CASE 
                WHEN archivos.user_id = grupo_user.user_id 
                AND archivos.fecha > actividades.fecha 
                THEN actividades.id END), 0) as entregadas_fuera_tiempo"),
                DB::raw("(COUNT(DISTINCT actividades.id) 
                - IFNULL(COUNT(DISTINCT CASE 
                    WHEN archivos.user_id = grupo_user.user_id 
                    THEN actividades.id END), 0)
            ) as no_entregadas")
            )
            ->groupBy('users.nombre', 'carreras.nombre', 'grupos.clave', 'materias.nombre')
            ->orderBy('users.nombre')
            ->orderBy('carreras.nombre')
            ->orderBy('grupos.clave');

        $result = $query->get();

        return $result;
    }


    public function headings(): array
    {
        return [
            'Docente',
            'Carrera',
            'Grupo',
            'Materia',
            'Actividades Totales',
            'Actividades Entregadas', // 👈 nueva columna
            'Entregadas a Tiempo',
            'Entregadas Fuera de Tiempo',
            'No Entregadas',
        ];
    }

    public function map($row): array
    {
        $aTiempo   = (int) ($row->entregadas_a_tiempo ?? 0);
        $fuera     = (int) ($row->entregadas_fuera_tiempo ?? 0);
        $noEnt     = (int) ($row->no_entregadas ?? 0);
        $total     = (int) ($row->actividades_totales ?? 0);

        $entregadas = $aTiempo + $fuera;

        return [
            $row->docente,
            $row->carrera,
            $row->grupo,
            $row->materia,
            (string) $total,
            (string) $entregadas,
            (string) $aTiempo,
            (string) $fuera,
            (string) $noEnt,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:I1')->getFont()->setBold(true); // 👈 ahora son 9 columnas

        foreach (range('A', 'I') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }
}
