<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha'];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}