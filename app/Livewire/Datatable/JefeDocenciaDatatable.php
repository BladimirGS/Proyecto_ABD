<?php

namespace App\Livewire\Datatable;

use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class JefeDocenciaDatatable extends DataTableComponent
{
    protected $model = Archivo::class;
    
    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setAdditionalSelects(['archivos.id as id'])
        // Dar click en fila
        ->setTableRowUrl(function($row) {
            return route('firma.show', $row);
        })
        // Abrir en otra ventana
        ->setTableRowUrlTarget(function($row) {
            return '_blank';
        });
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
                            'verArchivo' => 'verArchivo(' . $row->id . ')',
                        ]
                    )
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Archivo::query()
            ->whereHas('actividad', function (Builder $query) {
                $query->where('firma', true);
            });
    }

    public function verArchivo(Archivo $file)
    {
        $url = route('verArchivo', ['file' => $file->id, 'nombre' => $file->nombre]);
        
        $this->dispatch('archivoDisponible', $url);
    }
}
