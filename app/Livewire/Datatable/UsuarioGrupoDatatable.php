<?php

namespace App\Livewire\Datatable;

use App\Models\User;
use App\Models\Periodo;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UsuarioGrupoDatatable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['users.id as id'])
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => [
                    'livewire.datatable.create-area',
                    [
                        'ImportarGrupo' => route('grupos.usuarios.importarExcel'),
                    ],
                ],
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Docente", "nombre")
                ->sortable()
                ->searchable(),

            Column::make("Grupos")
                ->label(function ($row) {
                    return $row->gruposUser
                        ->map(function ($grupoUser) {
                            $grupo = $grupoUser->grupo;
                            return $grupo ? ($grupo->clave . ' - ' . $grupo->materia->nombre) : 'Sin grupos';
                        })
                        ->implode('<br>');
                })
                ->sortable()
                ->html(),

            Column::make('Acciones')
                ->unclickable()
                ->label(
                    fn($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'VerGrupos' => '$dispatch(\'openModal\', { component: \'grupo.mostrar-grupos-usuario\', arguments: { usuario: ' . $row->id . ' }})',
                            'AsignarGrupos' => '$dispatch(\'openModal\', { component: \'grupo.asignar-grupos\', arguments: { usuario: ' . $row->id . ' }})',
                        ]
                    )
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        // Obtenemos el último periodo activo
        $ultimoPeriodoId = Periodo::where('activo', true)
            ->orderByDesc('created_at')
            ->value('id');

        return User::query()
            ->with(['gruposUser' => function ($q) use ($ultimoPeriodoId) {
                $q->where('periodo_id', $ultimoPeriodoId)
                    ->with('grupo.materia');
            }])
            ->whereDoesntHave('roles', function ($q) {
                $q->where('name', 'SUPER USUARIO');
            })
            ->orderBy('id');
    }
}
