<?php

namespace App\Livewire\Datatable;

use App\Models\User;
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
                    return $row->grupos
                        ->map(function ($grupo) {
                            return ($grupo->clave . ' - ' . $grupo->materia->nombre) ?? 'Sin grupos';
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
        return User::query()
            ->with(['grupos' => function ($q) {
                $q->wherePivot('periodo_id', function ($sub) {
                    $sub->select('periodo_id')
                        ->from('grupo_user as gu2')
                        ->whereColumn('gu2.user_id', 'grupo_user.user_id')
                        ->orderByDesc('gu2.created_at')
                        ->limit(1);
                })
                    ->with('materia');
            }])
            ->whereDoesntHave('roles', function ($q) {
                $q->where('name', 'SUPER USUARIO');
            });
    }
}
