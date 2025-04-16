<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'nombres',
        'apellidos',
        'ci',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'profesion',
        'foto',
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function formacion()
    {
        return $this->hasMany(DocenteFormacion::class);
    }

    public function gruposAcademico()
    {
        return $this->hasMany(Grupos_academico::class);
    }
}
