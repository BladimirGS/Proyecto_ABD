<?php

namespace App\Livewire\Periodo;

use App\Models\Periodo;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class MostrarPeriodos extends Component
{
    use WithPagination;

    public $termino;

    #[On('eliminar-periodo')]
    public function EliminarPeriodo(Periodo $id) 
    {
        $id->delete();
    }

    #[On('buscar-periodo')]
    public function buscar($termino)
    {
        $this->termino = $termino;
        $this->resetPage();
    }

    #[On('actualizar-periodo')]
    public function render()
    {
        $periodos = Periodo::when($this->termino, function($query) {
            $query->where('clave', 'LIKE', "%" . $this->termino . "%")
                  ->orWhere('nombre', 'LIKE', "%" . $this->termino . "%");
        })
        ->paginate(5);
        
        return view('livewire.periodo.mostrar-periodos', [
            'periodos' => $periodos
        ]);
    }
}
