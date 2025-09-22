<?php

namespace App\Livewire\Datatable;

use App\Models\GrupoUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class DocenteGrupoDatatable extends DataTableComponent
{
    public string $tableName = 'grupos';

    public ?int $searchFilterDebounce = 600;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Clave", "grupo.clave")
                ->format(fn($value, $row) => optional($row->grupo)->clave)
                ->sortable()
                ->searchable(),

            ComponentColumn::make("Usuario", "user.nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Carrera", "grupo.carrera.nombre")
                ->component('break-normal')
                ->format(fn($value, $row) => optional($row->grupo?->carrera)->nombre)
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Materia", "grupo.materia.nombre")
                ->component('break-normal')
                ->format(fn($value, $row) => optional($row->grupo?->materia)->nombre)
                ->sortable()
                ->searchable(),

            Column::make("Periodo", "periodo.nombre")
                ->format(fn($value, $row) => optional($row->periodo)->nombre)
                ->sortable()
                ->searchable(),

            Column::make('Acciones')
                ->unclickable()
                ->label(
                    fn($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [

                            'IrArchivo' => route('docente.grupos.show', ['grupoUser' => $row->id]),
                        ]
                    )
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        return GrupoUser::query()
            ->with(['grupo.carrera', 'grupo.materia', 'grupo.periodo'])
            ->where('user_id', Auth::id())
            ->select('grupo_user.*');
    }
}
