<?php

namespace App\Livewire\Datatable;

use App\Models\Grupo;
use App\Models\Periodo;
use App\Exports\GruposExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class GrupoDatatable extends DataTableComponent
{
    public string $tableName = 'grupos';
    public array $grupos = [];

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
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => [
                    'livewire.datatable.create-area', [
                        'enlaceCrear' => route('grupos.create'),
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
                ->sortable()
                ->searchable()
                ->component('texto'),
            ComponentColumn::make("Carrera", "carrera.nombre")
                ->sortable()
                ->searchable()
                ->component('texto'),
            ComponentColumn::make("Materia", "materia.nombre")
                ->sortable()
                ->searchable()
                ->component('texto'),
            Column::make("Periodo", "periodo.nombre")
                ->sortable()
                ->searchable(),
            Column::make(' ')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'enlaceEditar' => route('grupos.edit', $row),
                            'eventoEliminar' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                            'grupo' => $row,
                            
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
            SelectFilter::make('Estado')
                ->options([
                    '' => 'Todo',
                    '1' => 'Activo',
                    '0' => 'Inactivo',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('activities.activo', true);
                    } elseif ($value === '0') {
                        $builder->where('activities.activo', false);
                    }
                })
        ];
    }

    public function builder(): Builder
    {
        return Grupo::query();
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activar',
            'deactivate' => 'Desactivar',
            'export' => 'Exportar',
        ];
    }

    public function export()
    {
        $grupos = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new GruposExport($grupos), 'grupos.xlsx');
    }

    public function activate()
    {
        Grupo::whereIn('id', $this->getSelected())->update(['activo' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        Grupo::whereIn('id', $this->getSelected())->update(['activo' => false]);

        $this->clearSelected();
    }
}
