<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Docente;
use App\Models\Gestion;
use App\Models\Grupos_academico;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use Illuminate\Http\Request;

class GruposAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupoAcademicos = Grupos_academico::with('docente.usuario','gestion','nivel','carrera','periodo','materia','turno','paralelo')->get();
        //return response()->json($grupoAcademicos);
        return view('admin.grupos_academicos.index',compact('grupoAcademicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docentes = Docente::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $carreras = Carrera::all();
        $periodos = Periodo::all();
        $materias = Materia::all();
        $turnos = Turno::all();
        $paralelos = Paralelo::all();
        return view('admin.grupos_academicos.create',compact('docentes','gestiones','niveles','carreras','periodos','materias','turnos','paralelos'));
    }

    public function buscar_docente($id){
        $docente = Docente::with('usuario','formacion')->find($id);
        if(!$docente){
            return response()->json(['error'=>'Docente no Encontrado']);
        }

        $docente->foto_url = url($docente->foto);
        return response()->json($docente);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'docente_id' => 'required',
            'gestion_id' =>'required',
            'nivel_id' =>'required',
            'carrera_id' =>'required',
            'periodo_id' =>'required',
            'materia_id' =>'required',
            'turno_id' =>'required',
            'paralelo_id' =>'required',
            'cupo_maximo' =>'required',
        ]);

        $existe = Grupos_academico::where([
            ['docente_id', $request->docente_id],
            ['gestion_id', $request->gestion_id],
            ['nivel_id', $request->nivel_id],
            ['carrera_id', $request->carrera_id],
            ['periodo_id', $request->periodo_id],
            ['materia_id', $request->materia_id],
            ['turno_id', $request->turno_id],
            ['paralelo_id', $request->paralelo_id],
        ])->first();

        if($existe){
            return redirect()->route('admin.grupos_academicos.index')
                ->withInput()
                ->with('mensaje','Ya Existe un Grupo Academico con estos Datos.')
                ->with('icono','warning');
        }

        $grupoAcademico = new Grupos_academico();
        $grupoAcademico->docente_id = $request->docente_id;
        $grupoAcademico->gestion_id = $request->gestion_id;
        $grupoAcademico->nivel_id = $request->nivel_id;
        $grupoAcademico->carrera_id = $request->carrera_id;
        $grupoAcademico->periodo_id = $request->periodo_id;
        $grupoAcademico->materia_id = $request->materia_id;
        $grupoAcademico->turno_id = $request->turno_id;
        $grupoAcademico->paralelo_id = $request->paralelo_id;
        $grupoAcademico->cupo_maximo = $request->cupo_maximo;
        $grupoAcademico->estado = 'activo';
        $grupoAcademico->fecha_asignacion = now();
        $grupoAcademico->save();

        return redirect()->route('admin.grupos_academicos.index')
                ->with('mensaje',' Grupo Academico Registrado Correctamente')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupos_academico $grupos_academico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grupoAcademico = Grupos_academico::with('docente.usuario','docente.formacion','gestion','nivel','carrera','periodo','materia','turno','paralelo')->find($id);
        $docentes = Docente::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $carreras = Carrera::all();
        $periodos = Periodo::all();
        $materias = Materia::all();
        $turnos = Turno::all();
        $paralelos = Paralelo::all();
        
        return view('admin.grupos_academicos.edit',compact('grupoAcademico','docentes','gestiones','niveles','carreras','periodos','materias','turnos','paralelos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'docente_id' => 'required',
            'gestion_id' =>'required',
            'nivel_id' =>'required',
            'carrera_id' =>'required',
            'periodo_id' =>'required',
            'materia_id' =>'required',
            'turno_id' =>'required',
            'paralelo_id' =>'required',
            'cupo_maximo' =>'required',
        ]);

        $existe = Grupos_academico::where([
            ['docente_id', $request->docente_id],
            ['gestion_id', $request->gestion_id],
            ['nivel_id', $request->nivel_id],
            ['carrera_id', $request->carrera_id],
            ['periodo_id', $request->periodo_id],
            ['materia_id', $request->materia_id],
            ['turno_id', $request->turno_id],
            ['paralelo_id', $request->paralelo_id],
        ])->first();

        if($existe){
            return redirect()->route('admin.grupos_academicos.index')
                ->withInput()
                ->with('mensaje','Ya Existe un Grupo Academico con estos Datos.')
                ->with('icono','warning');
        }

        $grupoAcademico = Grupos_academico::find($id);
        $grupoAcademico->docente_id = $request->docente_id;
        $grupoAcademico->gestion_id = $request->gestion_id;
        $grupoAcademico->nivel_id = $request->nivel_id;
        $grupoAcademico->carrera_id = $request->carrera_id;
        $grupoAcademico->periodo_id = $request->periodo_id;
        $grupoAcademico->materia_id = $request->materia_id;
        $grupoAcademico->turno_id = $request->turno_id;
        $grupoAcademico->paralelo_id = $request->paralelo_id;
        $grupoAcademico->cupo_maximo = $request->cupo_maximo;
        $grupoAcademico->estado = 'activo';
        $grupoAcademico->fecha_asignacion = now();
        $grupoAcademico->save();

        return redirect()->route('admin.grupos_academicos.index')
                ->with('mensaje',' Grupo Academico Actualizado Correctamente')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grupoAcademico = Grupos_academico::find($id);
        $grupoAcademico->delete();

        return redirect()->route('admin.grupos_academicos.index')
                ->with('mensaje','Grupo Academico Eliminado Correctamente')
                ->with('icono','success');
    }
}
