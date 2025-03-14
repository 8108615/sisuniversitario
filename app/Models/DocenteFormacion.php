<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteFormacion extends Model
{
    use HasFactory;

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
