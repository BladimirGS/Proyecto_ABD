<?php

namespace App\Livewire\Datatable;

use App\Models\User;
use App\Models\Contrato;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectDropdownFilter;

class UsuarioDatatable extends DataTableComponent
{
    public string $tableName = 'usuarios';

    public ?int $searchFilterDebounce = 600;

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
            ComponentColumn::make("Nombre", "nombre")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            ComponentColumn::make("Apellido", "apellido")
                ->component('break-normal')
                ->sortable()
                ->searchable(),
            // Column::make("Rfc", "rfc")
            //     ->sortable()
            //     ->searchable(),
            Column::make('Contratos')
                ->label(
                    fn ($row, Column $column) => view('livewire.datatable.contratos')->with([
                        'usuario' => $row,
                    ])
                )->html(),
            // Column::make("Email", "email")
            //     ->sortable()
            //     ->searchable(),
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
    
    public function filters(): array
    {
        return [
            SelectFilter::make('Contratos')
                ->options(
                    Contrato::query()
                        ->orderBy('nombre')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($contrato) => $contrato->nombre)
                        ->toArray()
                )
                ->filter(function(Builder $builder, string $value) {
                    $builder->whereHas('contratos', fn($query) => $query->where('contratos.id', $value));
                }),
        ];
    }
    
    
    // public function filters(): array
    // {
    //     return [
    //         MultiSelectFilter::make('Contratos')
    //             ->options(
    //                 ['no_contract' => 'Sin Contrato'] +  // Añade la opción especial al inicio
    //                 Contrato::query()
    //                     ->get()
    //                     ->keyBy('id')
    //                     ->map(fn($contrato) => $contrato->nombre)
    //                     ->toArray()
    //             )
    //             ->filter(function (Builder $builder, array $values) {
    //                 $noContract = false;
    
    //                 // Verifica si "Sin Contrato" está seleccionado
    //                 if (in_array('no_contract', $values)) {
    //                     $noContract = true;
    //                     // Elimina 'no_contract' de los valores para no interferir con los IDs de contratos
    //                     $values = array_diff($values, ['no_contract']);
    //                 }
    
    //                 if ($noContract) {
    //                     // Filtra usuarios que no tienen ningún contrato
    //                     $builder->whereDoesntHave('contratos');
    
    //                     if (!empty($values)) {
    //                         // También filtra usuarios que tienen los contratos seleccionados
    //                         $builder->orWhereHas('contratos', fn($query) => $query->whereIn('contratos.id', $values));
    //                     }
    //                 } elseif (!empty($values)) {
    //                     // Filtra usuarios que tienen los contratos seleccionados
    //                     $builder->whereHas('contratos', fn($query) => $query->whereIn('contratos.id', $values));
    //                 }
    //             })
    //     ];
    // }
    
    public function builder(): Builder
    {
        return User::query();
    }

    #[On('eliminar-usuario')]
    public function EliminarUsuario(User $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }
}
