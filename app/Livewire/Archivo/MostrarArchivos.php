<?php

namespace App\Livewire\Archivo;

use App\Models\Archivo;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class MostrarArchivos extends Component
{
    use WithPagination;

    public function download(Archivo $file)
    {
        return Storage::download($file->documento, $file->nombre);
    }

    public function render()
    {
        return view('livewire.archivo.mostrar-archivos', [
            'archivos' => Archivo::paginate()
        ]);
    }
}
