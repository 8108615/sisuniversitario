<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionMateria extends Model
{
    use HasFactory;

    public function matriculacion(){
        return $this->belongsTo(Matriculacion::class);
    }

    public function grupo_academico(){
        return $this->belongsTo(Grupos_academico::class);
    }

   
}
