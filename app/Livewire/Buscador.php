<?php

namespace App\Livewire;

use Livewire\Component;

class Buscador extends Component
{
    public $termino;
    public $evento;

    public function enviarTerminoBusqueda()
    {
        $this->dispatch($this->evento, termino: $this->termino);
    }

    public function render()
    {
        return view('livewire.buscador');
    }
}
