<?php

namespace App\Livewire\Datatable;

use App\Models\Grupo;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class GrupoDatatable extends DataTableComponent
{
    public string $tableName = 'grupos';

    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['grupos.id as id'])
            ->setConfigurableAreas([
                'toolbar-left-start' => [
                    'livewire.datatable.create-area', [
                        'CrearGrupo' => route('grupos.create'),
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
            ComponentColumn::make("Carrera", "carrera.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Materia", "materia.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'EditarGrupo' => route('grupos.edit', $row),
                            'EliminarGrupo' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                        ]
                    )
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Grupo::query();
    }

    #[On('eliminar-grupo')]
    public function EliminarGrupo(Grupo $id) 
    {
        $id->delete();
    }
}
