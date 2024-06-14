<?php

namespace App\Livewire\Datatable;

use App\Models\Periodo;
use Livewire\Attributes\On;
use App\Exports\PeriodoExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

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
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'Exportar' => '$dispatch(\'exportar\', { id: ' . $row->id . '})',
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
    public function exportar(Periodo $id) 
    {
        return Excel::download(new PeriodoExport, 'periodos.xlsx');
    }
}