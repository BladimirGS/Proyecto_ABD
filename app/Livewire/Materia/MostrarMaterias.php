<?php

namespace App\Livewire\Materia;

use App\Models\Materia;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class MostrarMaterias extends Component
{
    use WithPagination;

    public $termino;

    #[On('eliminar-materia')]
    public function EliminarUsuario(Materia $id) 
    {
        $id->delete();
    }

    #[On('buscar-materia')]
    public function buscar($termino)
    {
        $this->termino = $termino;
        $this->resetPage();
    }

    #[On('actualizar-materia')]
    public function render()
    {
        $materias = Materia::when($this->termino, function($query) {
            $query->where('clave', 'LIKE', "%" . $this->termino . "%")
                  ->orWhere('nombre', 'LIKE', "%" . $this->termino . "%");
        })
        ->paginate(5);
        
        return view('livewire.materia.mostrar-materias', [
            'materias' => $materias
        ]);
    }
}
