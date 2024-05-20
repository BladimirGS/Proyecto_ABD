<?php

namespace App\Livewire\Actividad;

use App\Models\Activity;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class MostrarActividades extends Component
{
    use WithPagination;

    public $termino;

    #[On('eliminar-actividad')]
    public function EliminarActividad(Activity $id) 
    {
        $id->delete();
    }

    #[On('buscar-actividad')]
    public function buscar($termino)
    {
        $this->termino = $termino;
        $this->resetPage();
    }

    #[On('actualizar-actividad')]
    public function render()
    {
        $actividades = Activity::when($this->termino, function($query) {
            $query->where('nombre', 'LIKE', "%" . $this->termino . "%")
                  ->orWhere('date', 'LIKE', "%" . $this->termino . "%");
        })
        ->paginate(5);

        return view('livewire.actividad.mostrar-actividades', [
            'actividades' => $actividades
        ]);
    }
}
