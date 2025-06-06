<?php

namespace App\Livewire\Datatable;

use App\Models\Grupo;
use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class DocenteGrupoArchivoDatatable extends DataTableComponent
{
    public Grupo $grupo;
    
    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        
        $this->setPrimaryKey('id')
        ->setAdditionalSelects(['archivos.id as id']);
    }

    public function columns(): array
    {
        return [
            Column::make("Grupo", "grupo.clave")
                ->sortable()
                ->searchable(),
            Column::make("grupo_id", "grupo.id")
                ->hideIf(true)
                ->sortable()
                ->searchable(),
            Column::make("Periodo", "grupo.periodo.nombre")
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Archivo", "nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Actividad", "actividad.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            Column::make("actividad_id", "actividad.id")
                ->hideIf(true)
                ->sortable()
                ->searchable(),
            DateColumn::make('Fecha', 'fecha')
                ->outputFormat('d/m/Y'),
            Column::make("Estado", "estado")
                ->sortable()
                ->searchable(),
            Column::make('Descargar')
                ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                            [
                                'IrArchivo' => route('docente.grupo.actividades.show', [$row['grupo.id'], $row['actividad.id']]),
                                'verArchivo' => 'verArchivo(' . $row->id . ')'
                            ]
                        )
                )->html(),
        ];
    }
    
    public function builder(): Builder
    {
        return Archivo::query()->where('grupo_id', $this->grupo->id);
    }

    public function verArchivo(Archivo $file)
    {
        $url = route('verArchivo', ['archivo' => $file->id, 'nombre' => $file->nombre]);
        
        $this->dispatch('archivoDisponible', $url);
    }
}
