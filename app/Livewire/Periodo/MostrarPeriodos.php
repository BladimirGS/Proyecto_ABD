<?php

namespace App\Livewire\Periodo;

use App\Models\Periodo;
use Livewire\Component;
use Livewire\Attributes\On;

class MostrarPeriodos extends Component
{
    #[On('eliminar-periodo')]
    public function EliminarPeriodo(Periodo $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }
}
