<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;

    protected $table = 'gestions';

    protected $fillable = [
        'nombre',
    ];

    public function matriculaciones(){
        return $this->hasMany(Matriculacion::class);
    }

    public function gruposAcademico()
    {
        return $this->hasMany(Grupos_academico::class);
    }
}
