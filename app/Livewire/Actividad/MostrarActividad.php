<?php

namespace App\Livewire\Actividad;

use App\Models\Actividad;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class MostrarActividad extends ModalComponent
{
    public Actividad $actividad;

    public function render()
    {
        return view('livewire.actividad.mostrar-actividad', [
            'actividad' => $this->actividad
        ]);
    }
}
