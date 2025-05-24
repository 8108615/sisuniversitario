<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaEstudiante extends Model
{
    use HasFactory;

    protected $table = 'asistencia_estudiantes';

    protected $fillable = [
        'asistencia_id',
        'estudiante_id',
        'estado',
    ];

    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
