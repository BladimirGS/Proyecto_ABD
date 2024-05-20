<?php

namespace App\Livewire\Actividad;

use Livewire\Component;
use App\Models\Activity;
use Illuminate\Http\File;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class MostrarActividad extends Component
{
    use WithFileUploads;

    public Activity $actividad;

    public $photo;
 
    public function CargarImagen()
    {
        Storage::putFile('photos', new File($this->photo));
    }

    public function render()
    {
        return view('livewire.actividad.mostrar-actividad');
    }
}
