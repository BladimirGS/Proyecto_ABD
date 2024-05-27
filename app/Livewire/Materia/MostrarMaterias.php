<?php

namespace App\Livewire\Materia;

use App\Models\Materia;
use Livewire\Component;
use Livewire\Attributes\On;

class MostrarMaterias extends Component
{
    #[On('eliminar-materia')]
    public function EliminarMaterio(Materia $id) 
    {
        $id->delete();

        // se dispara un evento
        $this->dispatch('refreshDatatable');
    }
}
