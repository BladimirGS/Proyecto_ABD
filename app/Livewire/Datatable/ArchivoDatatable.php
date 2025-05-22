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
            ->setAdditionalSelects(['archivos.id as id'])
            ->setHideBulkActionsWhenEmptyEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Grupo", "grupo.clave")
                ->sortable()
                ->searchable(),
            Column::make("Periodo", "grupo.periodo.nombre")
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Docente", "grupo.user.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Actividad", "actividad.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            DateColumn::make('Fecha', 'fecha')
                ->outputFormat('d/m/Y'),
            Column::make("Estado", "estado")
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
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
            SelectFilter::make('Periodo')
                ->options(
                    Periodo::query()
                        ->orderBy('nombre')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($periodo) => $periodo->nombre)
                        ->toArray()
                )
                ->filter(function(Builder $builder, string $value) {
                    $builder->whereHas('grupo.periodo', fn($query) => $query->where('periodos.id', $value));
                }),
            SelectFilter::make('Estado')
            ->options([
                '' => 'Todo',
                'aprobado' => 'Aprobado',
                'rechazado' => 'Rechazado',
                'pendiente' => 'Pendiente',
            ])
            ->filter(function (Builder $builder, string $value) {
                if ($value === 'aprobado') {
                    $builder->where('archivos.estado', 'Aprobado');
                } elseif ($value === 'rechazado') {
                    $builder->where('archivos.estado', 'Rechazado');
                } elseif ($value === 'pendiente') {
                    $builder->where('archivos.estado', 'Pendiente');
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

    public function bulkActions(): array
    {
        return [
            'aprobado' => 'Aprobado',
            'rechazado' => 'Rechazado',
            'pendiente' => 'Pendiente',
        ];
    }

    public function aprobado()
    {
        Archivo::whereIn('id', $this->getSelected())->update(['estado' => 'Aprobado']);

        $this->clearSelected();
    }

    public function rechazado()
    {
        Archivo::whereIn('id', $this->getSelected())->update(['estado' => 'Rechazado']);

        $this->clearSelected();
    }

    public function pendiente()
    {
        Archivo::whereIn('id', $this->getSelected())->update(['estado' => 'Pendiente']);

        $this->clearSelected();
    }

    public function verArchivo(Archivo $file)
    {
        $url = route('verArchivo', ['archivo' => $file->id, 'nombre' => $file->nombre]);
        
        $this->dispatch('archivoDisponible', $url);
    }
}
