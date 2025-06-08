<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalificacionEstudiante extends Model
{
    use HasFactory;

    protected $table = 'calificacion_estudiantes';
    protected $fillable = [
        'calificacion_id',
        'estudiante_id',
        'nota',
    ];

    public function calificacion()
    {
        return $this->belongsTo(Calificacion::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
