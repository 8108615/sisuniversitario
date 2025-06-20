<?php

namespace App\Http\Controllers;

use App\Models\AsignacionMateria;
use App\Models\Asistencia;
use App\Models\AsistenciaEstudiante;
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
            $grupos = Grupos_academico::all();
            return view('admin.asistencias.index_administrador',compact('grupos'));
        }
        if( $rol === "DOCENTE"){
            $docente = Auth::user()->docente;
            $grupos = Grupos_academico::where('docente_id',$docente->id)->get();
            return view('admin.asistencias.index_docente',compact('grupos'));
        }

        if( $rol === "ESTUDIANTE"){
            $estudiante = Auth::user()->estudiante;
            $matriculas = $estudiante->matriculaciones()->with(['asignacionMaterias.grupo_academico.materia', 
            'asignacionMaterias.grupo_academico.docente.usuario'])->get();
            return view('admin.asistencias.index_estudiante', compact('estudiante','matriculas'));
        }
        
    }

    public function show_estudiante($id,$grupoAcademicoId)
    {
        $asistencias = AsistenciaEstudiante::with(['asistencia.grupoAcademico.materia','estudiante','asistencia.grupoAcademico.docente.usuario'])
        ->where('estudiante_id', $id)
        ->whereHas('asistencia', function($query) use($grupoAcademicoId){
            $query->where('grupo_academico_id', $grupoAcademicoId);
        })->get();
        return view('admin.asistencias.show_estudiante', compact('asistencias', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $grupo = Grupos_academico::find($id);
        $asistencias = Asistencia::with('grupoAcademico','detalleAsistencias.estudiante')->where('grupo_academico_id', $id)->get();
        $asignaciones = AsignacionMateria::with('matriculacion.estudiante')
        ->where('grupo_academico_id',$id)
        ->get();
        return view('admin.asistencias.create',compact('asistencias','asignaciones','id','grupo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'grupo_academico_id' => 'required',
            'fecha' => 'required|date',
            'criterio' => 'required',
        ]);
        $asistencia = new Asistencia();
        $asistencia->grupo_academico_id = $request->grupo_academico_id;
        $asistencia->fecha = $request->fecha;
        $asistencia->observacion = $request->observacion;
        $asistencia->save();

        $criterio = $request->criterio;
        foreach($criterio as $estudianteId => $estado){
            AsistenciaEstudiante::create([
                'asistencia_id' => $asistencia->id,
                'estudiante_id' => $estudianteId,
                'estado' => $estado,
            ]);
        }

        return redirect()->back()
                ->with('mensaje',' Se Registro la Asistencia de la Manera Correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show_admin($id)
    {
        $asistencias = Asistencia::with('grupoAcademico','detalleAsistencias.estudiante')->where('grupo_academico_id', $id)->get();
        $asignaciones = AsignacionMateria::with('matriculacion.estudiante')
            ->where('grupo_academico_id', $id)
            ->get();
        return view('admin.asistencias.show_admin', compact('asistencias', 'asignaciones', 'id'));
    }
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
    public function destroy( $id)
    {
        $asistencia = Asistencia::find($id);
        $asistencia->delete();
        return redirect()->back()
                ->with('mensaje','Se Elimino la Asistencia de Manera Correcta')
                ->with('icono','success');
    }
}
