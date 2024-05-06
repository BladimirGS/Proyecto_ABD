<?php

namespace App\Livewire\Materia;

use App\Models\Materia;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditarMateria extends ModalComponent
{
    public Materia $materia;

    public $clave;
    public $nombre;

    public function mount()
    {
        // rellena los nuevos valores
        $this->clave = $this->materia->clave;
        $this->nombre = $this->materia->nombre;
    }

    protected $rules = [
        'clave' => 'required',
        'nombre' => 'required',
    ];

    public function EditarMateria()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // Se actualiza el usuario
        $this->materia->update($datos);

        // se dispara un evento
        $this->dispatch('actualizar-materia');

        // Se cierra el modal
        $this->closeModal();
    }
}
