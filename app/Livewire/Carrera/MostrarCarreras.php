<?php

namespace App\Livewire\Carrera;

use App\Models\Carrera;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class MostrarCarreras extends Component
{
    use WithPagination;

    public $termino;

    #[On('eliminar-carrera')]
    public function EliminarCarrera(Carrera $id) 
    {
        $id->delete();
    }

    #[On('buscar-carrera')]
    public function buscar($termino)
    {
        $this->termino = $termino;
        $this->resetPage();
    }

    #[On('actualizar-carrera')]
    public function render()
    {
        $carreras = Carrera::when($this->termino, function($query) {
            $query->where('nombre', 'LIKE', "%" . $this->termino . "%");
        })
        ->paginate(5);
        return view('livewire.carrera.mostrar-carreras', [
            'carreras' => $carreras
        ]);
    }
}
