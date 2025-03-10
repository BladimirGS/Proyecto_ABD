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

    protected $rules = [
        'clave' => 'required',
        'nombre' => 'required',
    ];

    public function mount()
    {
        $this->clave = $this->materia->clave;
        $this->nombre = $this->materia->nombre;
    }

    public function EditarMateria()
    {
        $datos = $this->validate();

        $this->materia->update($datos);

        $this->dispatch('refreshDatatable');

        $this->dispatch('exito'); 

        $this->closeModal();
    }
}
