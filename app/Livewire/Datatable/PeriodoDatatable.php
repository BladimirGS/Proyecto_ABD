<?php

namespace App\Livewire\Datatable;

use App\Models\Periodo;
use App\Exports\PeriodosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

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
                        'eventoCrear' => '$dispatch(\'openModal\', { component: \'periodo.crear-periodo\'})',
                    ],
                ],
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", "nombre")
                ->sortable(),
            Column::make("Fecha inicio", "fecha_inicio")
                ->sortable(),
            Column::make("Fecha fin", "fecha_fin")
                ->sortable(),
            BooleanColumn::make('activo')
                ->sortable()
                ->collapseOnMobile(),
            Column::make(' ')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'eventoEditar' => '$dispatch(\'openModal\', { component: \'periodo.editar-periodo\', arguments: { periodo: ' . $row . ' }})',
                            'eventoEliminar' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                            // 'eventoEstado' => '$dispatch(\'cambiar-estado\', { id: ' . $row->id . '})',
                            'periodo' => $row
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
}
