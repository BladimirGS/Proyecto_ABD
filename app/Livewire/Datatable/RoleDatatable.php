<?php

namespace App\Livewire\Datatable;

use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class RoleDatatable extends DataTableComponent
{
    public string $tableName = 'roles';

    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['roles.id as id'])
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => [
                    'livewire.datatable.create-area', [
                        'CrearRole' => route('roles.create'),
                    ],
                ],
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            ComponentColumn::make("Nombre", "name")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Descripción", "description")
                ->component('truncade')
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'EditarRole' => route('roles.edit', $row),
                            'EliminarRole' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                            'MostarRole' => '$dispatch(\'openModal\', { component: \'role.mostrar-role\', arguments: { role: ' . $row->id . ' }})',

                        ]
                    )
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Role::query();
    }

    #[On('eliminar-role')]
    public function EliminarRole(Role $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }
}
