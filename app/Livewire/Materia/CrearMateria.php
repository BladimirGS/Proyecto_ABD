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
        $datos = $this->validate();

        $datos['clave'] = mb_strtoupper($datos['clave'], 'UTF-8');
        $datos['nombre'] = mb_strtoupper($datos['nombre'], 'UTF-8');

        Materia::create([
            'clave' => $datos['clave'],
            'nombre' => $datos['nombre'],
        ]);

        $this->dispatch('refreshDatatable');
        $this->dispatch('exito');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.materia.crear-materia');
    }
}
