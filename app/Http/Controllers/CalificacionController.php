<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Grupos_academico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Auth::user()->roles->pluck('name')->implode(', ');

        /* if( $rol === "ADMINISTRADOR"){
            $grupos = Grupos_academico::all();
            return view('admin.asistencias.index_administrador',compact('grupos'));
        } */

        if( $rol === "DOCENTE"){
            $docente = Auth::user()->docente;
            $grupos = Grupos_academico::where('docente_id',$docente->id)->get();
            return view('admin.calificaciones.index_docente',compact('grupos'));
        }

        /* if( $rol === "ESTUDIANTE"){
            $estudiante = Auth::user()->estudiante;
            $matriculas = $estudiante->matriculaciones()->with(['asignacionMaterias.grupo_academico.materia', 
            'asignacionMaterias.grupo_academico.docente.usuario'])->get();
            return view('admin.asistencias.index_estudiante', compact('estudiante','matriculas'));
        } */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calificacion $calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }
}
