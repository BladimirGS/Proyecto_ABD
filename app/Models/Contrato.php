<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }    
}
