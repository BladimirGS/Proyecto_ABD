<?php

namespace App\Livewire\Datatable;

use App\Models\Grupo;
use App\Models\Periodo;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class GrupoDatatable extends DataTableComponent
{
    public string $tableName = 'grupos';

    public ?int $searchFilterDebounce = 600;

    public function mount()
    {
        // Obtener el último periodo
        $ultimoPeriodo = Periodo::latest('nombre')->first();
    
        // Verificar si hay algún período antes de aplicar el filtro
        if ($ultimoPeriodo) {
            $this->setFilter('periodos', [$ultimoPeriodo->id]);
        }
    }

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
            ComponentColumn::make("Usuario", "user.nombre")
                ->component('break-normal')
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
            Column::make("Periodo", "periodo.nombre")
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'IrGrupo' => route('grupos.show', $row),
                            'EditarGrupo' => route('grupos.edit', $row),
                            'EliminarGrupo' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                        ]
                    )
            )->html(),
        ];
    }

    public function filters(): array
    {
        return [
            MultiSelectFilter::make('Periodos')
                ->options(
                    Periodo::query()
                        ->orderBy('nombre', 'desc')
                        ->get()
                        ->keyBy('id')
                        ->map(fn ($periodo) => $periodo->nombre)
                        ->toArray()
                )->filter(function (Builder $builder, array $values) {
                    $builder->whereHas('periodo', fn ($query) => $query->whereIn('periodos.id', $values));
                }),
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
        $this->dispatch('refreshDatatable');
    }
}
