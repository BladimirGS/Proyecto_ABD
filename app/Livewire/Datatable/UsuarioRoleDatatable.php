<?php

namespace App\Livewire\Datatable;

use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UsuarioRoleDatatable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['users.id as id'])
            ->setHideBulkActionsWhenEmptyEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", "nombre")
                ->sortable(),
            Column::make("Roles")
                ->label(fn($row) => nl2br(e($row->roles->pluck('name')->join("\n"))))
                ->sortable()
                ->html(),
            Column::make('Acciones')
                ->unclickable()
                ->label(
                    fn($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'VerRoles' => '$dispatch(\'openModal\', { component: \'role.mostrar-roles-usuario\', arguments: { usuario: ' . $row->id . ' }})',
                            'AsignarRoles' => '$dispatch(\'openModal\', { component: \'role.asignar-roles\', arguments: { usuario: ' . $row->id . ' }})',
                        ]
                    )
                )->html(),
        ];
    }

    public function builder(): Builder
    {
        return User::query()
            ->whereDoesntHave('roles', function ($q) {
                $q->where('name', 'SUPER USUARIO');
            });
    }

    #[On('eliminar-usuario-role')]
    public function EliminarUsuarioRole(User $id)
    {
        $id->delete();
    }
}
