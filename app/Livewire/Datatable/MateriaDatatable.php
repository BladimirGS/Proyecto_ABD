<?php

namespace App\Livewire\Datatable;

use App\Models\Materia;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class MateriaDatatable extends DataTableComponent
{
    public string $tableName = 'materia';
    public array $materia = [];

    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setAdditionalSelects(['materias.id as id'])
        ->setHideBulkActionsWhenEmptyEnabled()
        ->setConfigurableAreas([
            'toolbar-left-start' => [
                'livewire.datatable.create-area', [
                    'CrearMateria' => '$dispatch(\'openModal\', { component: \'materia.crear-materia\'})',
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
                ->sortable(),
            Column::make('Acciones')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'EditarMateria' => '$dispatch(\'openModal\', { component: \'materia.editar-materia\', arguments: { materia: ' . $row->id . ' }})',
                            'EliminarMateria' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                        ]
                    )
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Materia::query();
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
        Materia::whereIn('id', $this->getSelected())->update(['activo' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        Materia::whereIn('id', $this->getSelected())->update(['activo' => false]);

        $this->clearSelected();
    }
    
    #[On('eliminar-materia')]
    public function EliminarMaterio(Materia $id) 
    {
        $id->delete();
    }
}
