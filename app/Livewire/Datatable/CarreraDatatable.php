<?php

namespace App\Livewire\Datatable;

use App\Models\Carrera;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

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
                    'CrearCarrera' => '$dispatch(\'openModal\', { component: \'carrera.crear-carrera\'})',
                ],
            ],
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Clave", "clave")
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Nombre", "nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            BooleanColumn::make('activo')
                ->sortable()
                ->collapseOnMobile(),
            Column::make('Acciones')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'EditarCarrera' => '$dispatch(\'openModal\', { component: \'carrera.editar-carrera\', arguments: { carrera: ' . $row->id . ' }})',
                            'EliminarCarrera' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
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

    #[On('eliminar-carrera')]
    public function EliminarCarrera(Carrera $id) 
    {
        $id->delete();
    }
}
