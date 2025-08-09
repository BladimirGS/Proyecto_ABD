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

class ArchivoDatatable extends DataTableComponent
{
    public string $tableName = 'archivos';

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
                            'IrArchivo' => route('archivos.show', $row),
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
                    'aprobado' => 'Aprobado',
                    'rechazado' => 'Rechazado',
                    'pendiente' => 'Pendiente',
                    'modificado' => 'Modificado',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'aprobado') {
                        $builder->where('archivos.estado', 'Aprobado');
                    } elseif ($value === 'rechazado') {
                        $builder->where('archivos.estado', 'Rechazado');
                    } elseif ($value === 'pendiente') {
                        $builder->where('archivos.estado', 'Pendiente');
                    } elseif ($value === 'modificado') {
                        $builder->where('archivos.estado', 'Modificado');
                    }
                })
        ];
    }

    public function builder(): Builder
    {
        return Archivo::query()
            ->whereHas('actividad', function (Builder $query) {
                $query->where('firma', false);
            });
    }

    public function verArchivo(Archivo $file)
    {
        $url = route('verArchivo', ['archivo' => $file->id, 'nombre' => $file->nombre]);

        $this->dispatch('archivoDisponible', $url);
    }
}
