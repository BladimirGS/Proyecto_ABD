<?php

namespace App\Livewire\Materia;

use App\Models\Materia;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearMateria extends ModalComponent
{
    public $clave;
    public $nombre;

    protected $rules = [
        'clave' => 'required',
        'nombre' => 'required',
    ];

    public function CrearMateria()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // crear usuario
        Materia::create([
            'clave' => $datos['clave'],
            'nombre' => $datos['nombre'],
        ]);

        $this->dispatch('actualizar-materia');

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.materia.crear-materia');
    }
}
