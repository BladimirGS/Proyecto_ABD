<?php

namespace App\Livewire\Actividad;

use App\Models\Activity;
use Livewire\Component;
use Livewire\Attributes\On;

class MostrarActividades extends Component
{
    #[On('eliminar-actividad')]
    public function EliminarActividad(Activity $id) 
    {
        $id->delete();
        $this->dispatch('refreshDatatable');
    }

    // #[On('cambiar-estado')]
    // public function CambiarEstado($id)
    // {   
    //     $actividad = Activity::find($id);

    //     if ($actividad) {
    //         $actividad->activo = !$actividad->activo;
    //         $actividad->save();
    //     }
    
    //     // Actualizar datatable
    //     $this->dispatch('refreshDatatable');
    // }
}
