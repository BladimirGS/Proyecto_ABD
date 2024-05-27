<?php

namespace App\Livewire\Carrera;

use App\Models\Carrera;
use Livewire\Component;
use Livewire\Attributes\On;

class MostrarCarreras extends Component
{
    #[On('eliminar-carrera')]
    public function EliminarCarrera(Carrera $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }
}
