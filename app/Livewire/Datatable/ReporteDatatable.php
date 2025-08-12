<?php

namespace App\Livewire\Datatable;

use App\Models\Periodo;
use Livewire\Attributes\On;
use App\Exports\PeriodoExport;
use App\Exports\ReporteGeneral;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ReporteDatatable extends DataTableComponent
{
    public string $tableName = 'periodo';
    public array $periodo = [];

    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['periodos.id as id'])
            ->setHideBulkActionsWhenEmptyEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Periodos", "nombre")
                ->sortable(),
            Column::make(' ')
                ->label(
                    fn($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'Exportar' => '$dispatch(\'exportar\', { id: ' . $row->id . '})',
                            'ReporteGeneral' => '$dispatch(\'reporteGeneral\', { id: ' . $row->id . '})',
                        ]
                    )
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Periodo::query();
    }

    #[On('exportar')]
    public function exportar(int $id)
    {
        $periodo = Periodo::findOrFail($id);
        $fileName = 'reporte ' . $periodo->nombre . '.xlsx';

        return Excel::download(new PeriodoExport($id), $fileName);
    }


    #[On('reporteGeneral')]
    public function exportarGeneral(int $id)
    {
        $periodo = Periodo::findOrFail($id);
        $fileName = 'reporte ' . $periodo->nombre . '.xlsx';

        return Excel::download(new ReporteGeneral($id), $fileName);
    }
}
