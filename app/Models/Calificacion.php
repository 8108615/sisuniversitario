<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    public function grupoAcademico()
    {
        return $this->belongsTo(Grupos_academico::class);
    }

    public function detalleCalificaciones()
    {
        return $this->hasMany(CalificacionEstudiante::class);
    }
}
