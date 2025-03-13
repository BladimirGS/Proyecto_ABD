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
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => [
                    'livewire.datatable.create-area', [
                        'CrearUsuario' => '$dispatch(\'openModal\', { component: \'usuario.crear-usuario\'})',
                    ],
                ],
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", "nombre")
                ->sortable(),
            Column::make('Acciones')
            ->unclickable()
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.action-column')->with(
                        [
                            'EditarUsuario' => '$dispatch(\'openModal\', { component: \'usuario.editar-usuario\', arguments: { usuario: ' . $row->id . ' }})',
                            'EliminarUsuario' => '$dispatch(\'mostrarAlerta\', { id: ' . $row->id . '})',
                            'MostarUsuario' => '$dispatch(\'openModal\', { component: \'usuario.mostrar-usuario\', arguments: { usuario: ' . $row->id . ' }})',
                            'AsignarRoles' => '$dispatch(\'openModal\', { component: \'usuario.asignar-roles\', arguments: { usuario: ' . $row->id . ' }})',
                        ]
                    )
            )->html(),
        ];
    }
    
    public function builder(): Builder
    {
        return User::query();
    }

    #[On('eliminar-usuario-role')]
    public function EliminarUsuarioRole(User $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }
}
