<?php

namespace App\Livewire\Datatable;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class CarreraDatatable extends DataTableComponent
{
    public string $tableName = 'carrera';
    public array $carrera = [];

    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setAdditionalSelects(['carreras.id as id'])
        ->setHideBulkActionsWhenEmptyEnabled()
        ->setConfigurableAreas([
            'toolbar-left-start' => [
                'livewire.datatable.create-area', [
                    'eventoCrear' => '$dispatch(\'openModal\', { component: \'carrera.crear-carrera\'})',
                ],
            ],
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", "nombre")
                ->sortable(),
            BooleanColumn::make('activo')
                ->sortable()
                ->collapseOnMobile(),
            Column::make(' ')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            // 'eventoEditar' => route('grupos.edit', $row),
                            'eventoEditar' => '$dispatch(\'openModal\', { component: \'carrera.editar-carrera\', arguments: { carrera: ' . $row->id . ' }})',
                            'eventoEliminar' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                            // 'grupo' => $row,
                        ]
                    )
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Carrera::query();
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
        Carrera::whereIn('id', $this->getSelected())->update(['activo' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        Carrera::whereIn('id', $this->getSelected())->update(['activo' => false]);

        $this->clearSelected();
    }
}
