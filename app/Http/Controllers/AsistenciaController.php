<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Grupos_academico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Auth::user()->roles->pluck('name')->implode(', ');
        if( $rol === "ADMINISTRADOR"){
            return view('admin.asistencias.index_administrador');
        }
        if( $rol === "DOCENTE"){
            $docente = Auth::user()->docente;
            $grupos = Grupos_academico::where('docente_id',$docente->id)->get();
            return view('admin.asistencias.index_docente',compact('grupos'));
        }

        if( $rol === "ESTUDIANTE"){
            return view('admin.asistencias.index_estudiante');
        }
        
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
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
