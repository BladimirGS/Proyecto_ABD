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

class GrupoArchivoDatatable extends DataTableComponent
{

    // no esta implementado esta tabla
    
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
            // Column::make("Periodo", "grupo.periodo.nombre")
            //     ->sortable()
            //     ->searchable(),
            // ComponentColumn::make("Docente", "grupo.user.nombre")
            //     ->component('break-normal')
            //     ->sortable()
            //     ->searchable(),
            // ComponentColumn::make("Archivo", "nombre")
            //     ->component('break-normal')
            //     ->sortable()
            //     ->searchable(),
            ComponentColumn::make("Actividad", "actividad.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            DateColumn::make('Fecha', 'fecha')
                ->outputFormat('d/m/Y'),
            Column::make("Estado", "estado")
                ->sortable()
                ->searchable(),
            Column::make('Descargar')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'DescargarArchivo' => 'descargar(' . $row->id . ')',
                        ]
                    )
            )->html(),
        ];
    }
    
    public function builder(): Builder
    {
        return Archivo::query()->where('grupo_id', $this->grupo->id);
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

    public function descargar(Archivo $file)
    {
        return Storage::download($file->documento, $file->nombre);
    }
}
