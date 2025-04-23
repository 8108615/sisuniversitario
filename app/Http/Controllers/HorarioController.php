<?php

namespace App\Http\Controllers;

use App\Models\Grupos_academico;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::all();
        return view('admin.horarios.index',compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gruposAcademicos = Grupos_academico::all();
        return view('admin.horarios.create',compact('gruposAcademicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function buscar_grupo_academico($id){
        $grupoAcademico = Grupos_academico::with('docente.usuario','docente.formacion','gestion','nivel','periodo','carrera','materia','turno','paralelo')->find($id);
        if(!$grupoAcademico){
            return response()->json(['error'=>'Grupo no Encontrado']);
        }

        $grupoAcademico->foto_url = url($grupoAcademico->foto);
        return response()->json($grupoAcademico);
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
