<?php

namespace App\Livewire\Grupo;

use App\Models\Grupo;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class MostrarGrupos extends Component
{
    use WithPagination;

    public $termino;

    #[On('eliminar-grupo')]
    public function EliminarGrupo(Grupo $id) 
    {
        $id->delete();
    }

    #[On('buscar-grupo')]
    public function buscar($termino)
    {
        $this->termino = $termino;
        $this->resetPage();
    }

    #[On('actualizar-grupo')]
    public function render()
    {
        return view('livewire.grupo.mostrar-grupos', [
            'grupos' => Grupo::paginate()
        ]);
    }
}
