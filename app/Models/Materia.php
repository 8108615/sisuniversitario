<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';

    protected $fillable = [
        'carrera_id',
        'nombre',
        'codigo',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function asignacionMaterias(){
        return $this->hasMany(AsignacionMateria::class);
    }

    public function gruposAcademico()
    {
        return $this->hasMany(Grupos_academico::class);
    }
}
