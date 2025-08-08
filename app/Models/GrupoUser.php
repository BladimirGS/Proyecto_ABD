<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Grupo;

class GrupoUser extends Pivot
{
    protected $table = 'grupo_user';

    protected $fillable = ['grupo_id', 'user_id', 'periodo_id'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
