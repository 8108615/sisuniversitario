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
        $horarios = Horario::with('grupoAcademico.docente.usuario','grupoAcademico.gestion','grupoAcademico.nivel','grupoAcademico.periodo','grupoAcademico.carrera','grupoAcademico.materia','grupoAcademico.turno','grupoAcademico.paralelo')->get();
            
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

        $grupoAcademico->foto_url = url($grupoAcademico->docente->foto);
        return response()->json($grupoAcademico);
    }


    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'grupo_academico_id' => 'required',
            'dia' =>'required',
            'aula' =>'required',
            'hora_inicio' =>'required',
            'hora_fin' =>'required',
            
        ]);

        $existe = Horario::where([
            ['grupo_academico_id', $request->grupo_academico_id],
            ['dia', $request->dia],
            ['aula', $request->aula],
            ['hora_inicio', $request->hora_inicio],
            ['hora_fin', $request->hora_fin],
        ])->first();

        if($existe){
            return redirect()->route('admin.horarios.index')
                ->withInput()
                ->with('mensaje','Ya Existe un Horario del Grupo Academico con estos Datos.')
                ->with('icono','warning');
        }


        $horario = new Horario();
        $horario->grupo_academico_id = $request->grupo_academico_id;
        $horario->dia = $request->dia;
        $horario->aula = $request->aula;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->save();

        return redirect()->route('admin.horarios.index')
                ->with('mensaje','Se Registro el Horario de la Manera Correcta.')
                ->with('icono','success');
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
    public function edit($id)
    {
        $horario = Horario::with('grupoAcademico.docente.usuario','grupoAcademico.gestion','grupoAcademico.nivel','grupoAcademico.periodo','grupoAcademico.carrera','grupoAcademico.materia','grupoAcademico.turno','grupoAcademico.paralelo')->find($id);
        $gruposAcademicos = Grupos_academico::all();
        return view('admin.horarios.edit',compact('horario','gruposAcademicos'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'grupo_academico_id' => 'required',
            'dia' =>'required',
            'aula' =>'required',
            'hora_inicio' =>'required',
            'hora_fin' =>'required',
            
        ]);

        $existe = Horario::where([
            ['grupo_academico_id', $request->grupo_academico_id],
            ['dia', $request->dia],
            ['aula', $request->aula],
            ['hora_inicio', $request->hora_inicio],
            ['hora_fin', $request->hora_fin],
        ])->first();

        if($existe){
            return redirect()->route('admin.horarios.index')
                ->withInput()
                ->with('mensaje','Ya Existe un Horario del Grupo Academico con estos Datos.')
                ->with('icono','warning');
        }


        $horario = Horario::find($id);
        $horario->grupo_academico_id = $request->grupo_academico_id;
        $horario->dia = $request->dia;
        $horario->aula = $request->aula;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->save();

        return redirect()->route('admin.horarios.index')
                ->with('mensaje','Se Actualizo el Horario de la Manera Correcta.')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $horario = Horario::find($id);
        $horario->delete();

        return redirect()->route('admin.horarios.index')
                ->with('mensaje','Horario Eliminado Correctamente')
                ->with('icono','success');
    }
}
