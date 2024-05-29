<?php

namespace App\Livewire\Grupo;

use App\Models\Grupo;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class MostrarGrupos extends Component
{
    #[On('eliminar-grupo')]
    public function EliminarGrupo(Grupo $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.grupo.mostrar-grupos');
    }
}
