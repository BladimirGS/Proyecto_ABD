<?php

namespace App\Livewire\Actividad;

use App\Models\Grupo;
use App\Models\Archivo;
use Livewire\Component;
use App\Models\Activity;
use Illuminate\Http\File;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MostrarActividad extends Component
{
    use WithFileUploads;

    public Activity $actividad;
    public Grupo $grupo;

    public $archivoExistente;
    
    #[Validate('required', message: 'Por favor de subir su archivo')]
    public $files;

    public function submit()
    {
        $this->validate();
    
        // Si existe un archivo asociado, eliminarlo
        if ($this->archivoExistente) {
            Storage::delete($this->archivoExistente->documento);
            $this->archivoExistente->delete();
        }
    
        $directorio = 'files/' . $this->grupo->user->nombre . '_' . $this->grupo->user->apellido . '/' . $this->grupo->clave . '-' . $this->grupo->periodo->nombre;
        
        // Subir el nuevo archivo
        $documento = Storage::putFile($directorio, new File($this->files[0]['path']));
        
        // Crear una nueva instancia de Archivo y guardarla en la base de datos
        Archivo::create([
            'nombre' => $this->files[0]['name'],
            'documento' => $documento,
            'grupo_id' => $this->grupo->id,
            'activity_id' => $this->actividad->id,
        ]);
    
        // Limpiar el array de archivos después de subirlos
        $this->files = [];
    
        // Emitir un evento para indicar que se ha actualizado la información
        $this->dispatch('archivosSubidos');

        $this->archivoExistente = Archivo::where('grupo_id', $this->grupo->id)
        ->where('activity_id', $this->actividad->id)
        ->first();
    
        // Actualizar el componente Livewire
        return redirect()->to(route('actividades.show', ['grupo' => $this->grupo, 'actividad' => $this->actividad]));
    }

    public function render()
    {
        // Verificar si ya existe un archivo asociado a la actividad y al grupo
        $this->archivoExistente = Archivo::where('grupo_id', $this->grupo->id)
        ->where('activity_id', $this->actividad->id)
        ->first();

        return view('livewire.actividad.mostrar-actividad');
    }
}
