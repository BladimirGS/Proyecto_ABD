<?php

namespace App\Livewire\Actividad;

use App\Models\Grupo;
use App\Models\Archivo;
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
    public Grupo $grupo;
    
    #[Validate('required', message: 'Por favor de subir su archivo')]
    public array $files = [];
 
    public function submit()
    {
        $this->validate();

        $directorio = 'files/' . $this->grupo->user->nombre . '_' . $this->grupo->user->apellido . '/' . $this->grupo->clave . '-' . $this->grupo->periodo->nombre;

        foreach ($this->files as $file) {
            $documento = Storage::putFile($directorio, new File($file['path']));
            
            // Crear una nueva instancia de Archivo y guardarla en la base de datos
            Archivo::create([
                'nombre' => $file['name'],
                'documento' => $documento,
                'grupo_id' => $this->grupo->id,
                'activity_id' => $this->actividad->id,
            ]);
        }

        // Limpiar el array de fotos después de subirlas
        $this->files = [];

        // Emitir un evento para indicar que se ha actualizado la información
        $this->dispatch('archivosSubidos');

        // Recargar la página
        return back();
    }
}
