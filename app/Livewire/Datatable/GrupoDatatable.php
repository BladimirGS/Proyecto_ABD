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
        // Obtener el primer periodo
        $ultimoPeriodo = Periodo::latest('nombre')->first();

        // Aplicar el primer periodo como filtro predeterminado
        $this->setFilter('periodos', [$ultimoPeriodo->id]);
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
            ])
            // Dar click en fila
            ->setTableRowUrl(function($row) {
                return route('grupos.show', $row);
            })
            // Abrir en otra ventana
            ->setTableRowUrlTarget(function($row) {
                return '_blank';
            });
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
            // SelectFilter::make('Estado')
            //     ->options([
            //         '' => 'Todo',
            //         '1' => 'Activo',
            //         '0' => 'Inactivo',
            //     ])
            //     ->filter(function (Builder $builder, string $value) {
            //         if ($value === '1') {
            //             $builder->where('activities.activo', true);
            //         } elseif ($value === '0') {
            //             $builder->where('activities.activo', false);
            //         }
            //     })
        ];
    }

    public function builder(): Builder
    {
        return Grupo::query();
    }

    // public function bulkActions(): array
    // {
    //     return [
    //         'activate' => 'Activar',
    //         'deactivate' => 'Desactivar',
    //         'export' => 'Exportar',
    //     ];
    // }

    // public function export()
    // {
    //     $grupos = $this->getSelected();

    //     $this->clearSelected();

    //     return Excel::download(new GruposExport($grupos), 'grupos.xlsx');
    // }

    // public function activate()
    // {
    //     Grupo::whereIn('id', $this->getSelected())->update(['activo' => true]);

    //     $this->clearSelected();
    // }

    // public function deactivate()
    // {
    //     Grupo::whereIn('id', $this->getSelected())->update(['activo' => false]);

    //     $this->clearSelected();
    // }

    #[On('eliminar-grupo')]
    public function EliminarGrupo(Grupo $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }
}
