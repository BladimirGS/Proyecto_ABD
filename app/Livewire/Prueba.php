<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Prueba extends Component
{
    public $title;
 
    #[On('prueba')]
    public function save() 
    {
        $this->dispatch('mostrarAlerta');
    }

    public function render()
    {
        return view('livewire.prueba');
    }
}
