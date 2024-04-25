<?php

namespace App\Livewire\Usuario;

use Livewire\Component;

class FiltrarUsuarios extends Component
{
    public $termino;
    public $evento;

    public function mount($evento)
    {
        $this->evento = $evento;
    }

    public function leerDatosFormulario()
    {
        $this->dispatch($this->evento, termino: $this->termino);
    }

    public function render()
    {
        return view('livewire.usuario.filtrar-usuarios');
    }
}
