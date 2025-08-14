<?php

namespace App\Livewire\Datatable;

use App\Models\Archivo;
use App\Models\Periodo;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class JefeDocenciaDatatable extends DataTableComponent
{
    protected $model = Archivo::class;

    public ?int $searchFilterDebounce = 600;

    public function mount()
    {
        $ultimoPeriodo = Periodo::latest('nombre')->first();

        if ($ultimoPeriodo) {
            $this->setFilter('periodos', [$ultimoPeriodo->id]);
        }
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['archivos.id as id']);
    }

    public function columns(): array
    {
        return [
            Column::make("Grupo", "grupoUser.grupo.clave")
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Materia", "grupoUser.grupo.materia.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            Column::make("Periodo", "grupoUser.periodo.nombre")
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Docente", "grupoUser.user.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Actividad", "actividad.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            Column::make("Estado", "estado")
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->unclickable()
                ->label(
                    fn($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'IrArchivo' => route('firma.show', $row),
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
                        ->where('activo', true)
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($periodo) => $periodo->nombre)
                        ->toArray()
                )
                ->filter(function (Builder $builder, array $values) {
                    $builder->whereHas(
                        'grupoUser.periodo',
                        fn($query) => $query->whereIn('periodos.id', $values)
                    );
                }),
            SelectFilter::make('Estado')
                ->options([
                    '' => 'Todo',
                    'Aprobado' => 'Aprobado',
                    'Rechazado' => 'Rechazado',
                    'Pendiente' => 'Pendiente',
                    'modificado' => 'Modificado',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value !== '') {
                        $builder->where('archivos.estado', $value);
                    }
                })
        ];
    }

    public function builder(): Builder
    {
        return Archivo::query()
            ->whereHas('actividad', fn(Builder $q) => $q->where('firma', true))
            ->whereHas('grupoUser.periodo', fn(Builder $q) => $q->where('activo', true))
            ->where('estado', '<>', 'Firmado')
            ->join('grupo_user', 'archivos.grupo_user_id', '=', 'grupo_user.id')
            ->join('periodos', 'grupo_user.periodo_id', '=', 'periodos.id')
            ->orderBy('periodos.created_at', 'desc')
            ->orderByRaw("
            CASE estado
                WHEN 'pendiente' THEN 1
                WHEN 'modificado' THEN 2
                WHEN 'rechazado' THEN 3
                WHEN 'aprobado' THEN 4
                ELSE 5
            END
        ");
    }
}
