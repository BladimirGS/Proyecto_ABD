<?php

namespace App\Livewire\Usuario;

use Livewire\Component;

class FiltrarUsuarios extends Component
{
    public $termino;

    public function leerDatosFormulario()
    {
        $this->dispatch('buscar-usuario', termino: $this->termino);
    }

    public function render()
    {
        return view('livewire.usuario.filtrar-usuarios');
    }
}
