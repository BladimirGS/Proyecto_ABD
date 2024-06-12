<?php

namespace App\Livewire\Datatable;

use App\Models\Periodo;
use App\Models\Activity;
use Livewire\Attributes\On;
use App\Exports\ActividadesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class ActividadDatatable extends DataTableComponent
{
    public string $tableName = 'actividad';
    public array $actividad = [];

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
            ->setAdditionalSelects(['activities.id as id'])
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => [
                    'livewire.datatable.create-area', [
                        'CrearActividad' => '$dispatch(\'openModal\', { component: \'actividad.crear-actividad\'})',
                    ],
                ],
            ]);
    }

    public function columns(): array
    {
        return [
            ComponentColumn::make("Nombre", "nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Descripción", "descripcion")
                ->component('truncade')
                ->sortable()
                ->searchable(),
            DateColumn::make('Fecha', 'fecha')
                ->outputFormat('d/m/Y'),
            Column::make("Periodo", "periodo.nombre")
                ->sortable()
                ->searchable(),
            BooleanColumn::make('activo')
                ->sortable(),
            Column::make('Acciones')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'EditarActividad' => '$dispatch(\'openModal\', { component: \'actividad.editar-actividad\', arguments: { actividad: ' . $row->id . ' }})',
                            'EliminarActividad' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
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
        return Activity::query();
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
        Activity::whereIn('id', $this->getSelected())->update(['activo' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        Activity::whereIn('id', $this->getSelected())->update(['activo' => false]);

        $this->clearSelected();
    }
    
    #[On('eliminar-actividad')]
    public function EliminarActividad(Activity $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }
}
