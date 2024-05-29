<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre', 
        'documento',
        'fecha',
        'grupo_id',
        'activity_id'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
    
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
