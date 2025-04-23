<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos_academico extends Model
{
    use HasFactory;

    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function gestion(){
        return $this->belongsTo(Gestion::class);
    }

    public function nivel(){
        return $this->belongsTo(Nivel::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class);
    }

    public function materia(){
        return $this->belongsTo(Materia::class);
    }

    public function turno(){
        return $this->belongsTo(Turno::class);
    }

    public function paralelo(){
        return $this->belongsTo(Paralelo::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

}
