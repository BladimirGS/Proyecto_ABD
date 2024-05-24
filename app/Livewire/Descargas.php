<?php

namespace App\Livewire;

use App\Models\Archivo;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Descargas extends Component
{
    public Archivo $archivoExistente;

    public function download(Archivo $file)
    {
        return Storage::download($file->documento, $file->nombre);
    }

    public function render()
    {
        return view('livewire.descargas');
    }
}
