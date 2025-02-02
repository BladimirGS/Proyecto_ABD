<?php

namespace App\Livewire\Datatable;

use App\Models\Periodo;
use Livewire\Attributes\On;
use App\Exports\PeriodosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class PeriodoDatatable extends DataTableComponent
{
    public string $tableName = 'periodo';
    public array $periodo = [];

    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['periodos.id as id'])
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => [
                    'livewire.datatable.create-area', [
                        'CrearPeriodo' => '$dispatch(\'openModal\', { component: \'periodo.crear-periodo\'})',
                    ],
                ],
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", "nombre")
                ->sortable(),
            DateColumn::make('Inicio', 'fecha_inicio')
                ->outputFormat('d/m/Y'),
            DateColumn::make('Fin', 'fecha_fin')
                ->outputFormat('d/m/Y'),
            BooleanColumn::make('activo')
                ->sortable()
                ->collapseOnMobile(),
            Column::make(' ')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'EditarPeriodo' => '$dispatch(\'openModal\', { component: \'periodo.editar-periodo\', arguments: { periodo: ' . $row->id . ' }})',
                            'EliminarPeriodo' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                        ]
                    )
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Periodo::query();
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activar',
            'deactivate' => 'Desactivar',
        ];
    }

    public function activate()
    {
        Periodo::whereIn('id', $this->getSelected())->update(['activo' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        Periodo::whereIn('id', $this->getSelected())->update(['activo' => false]);

        $this->clearSelected();
    }

    #[On('eliminar-periodo')]
    public function EliminarPeriodo(Periodo $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }
}
