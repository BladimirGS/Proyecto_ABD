<?php

namespace App\Livewire\Datatable;

use App\Models\Archivo;
use App\Models\Periodo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

class JefeDocenciaDatatable extends DataTableComponent
{
    protected $model = Archivo::class;

    public ?int $searchFilterDebounce = 600;

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
                            'verArchivo' => 'verArchivo(' . $row->id . ')',
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
                        ->where('activo', true)           // Solo activos
                        ->orderBy('created_at', 'desc')   // Ordenar por fecha creación descendente
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
            ->whereHas('actividad', function (Builder $query) {
                $query->where('firma', true);
            })
            ->whereHas('grupoUser.periodo', function (Builder $query) {
                $query->where('activo', true); // Solo periodos activos
            })
            ->orderBy('archivos.created_at', 'desc'); // aclarar tabla aquí
    }

    public function verArchivo(Archivo $file)
    {
        $url = route('verArchivo', ['archivo' => $file->id, 'nombre' => $file->nombre]);

        $this->dispatch('archivoDisponible', $url);
    }
}
