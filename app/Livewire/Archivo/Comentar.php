<?php

namespace App\Livewire\Archivo;

use App\Models\Grupo;
use App\Models\Archivo;
use Livewire\Component;
use App\Models\Actividad;
use App\Models\Comentario;
use LivewireUI\Modal\ModalComponent;

class Comentar extends ModalComponent
{
    public $comentario;
    public Archivo $archivo;

    protected $rules = [
        'comentario' => 'required',
    ];

    public function CrearComentario()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // crear materia
        Comentario::create([
            'comentario' => $datos['comentario'],
            'grupo_id' => $this->archivo->grupo_id,
            'actividad_id' => $this->archivo->actividad_id,
        ]);

        // se dispara un evento
        $this->dispatch('refreshDatatable');

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.archivo.comentar');
    }
}
