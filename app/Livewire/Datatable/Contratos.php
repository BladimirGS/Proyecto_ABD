<?php

namespace App\Livewire\Datatable;

use App\Models\User;
use Livewire\Component;

class Contratos extends Component
{
    public User $usuario;

    public function render()
    {
        return view('livewire.datatable.contratos', ['usuario' => $this->usuario]);
    }
}
