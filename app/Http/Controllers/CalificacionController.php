<?php

namespace App\Http\Controllers;

use App\Models\AsignacionMateria;
use App\Models\Calificacion;
use App\Models\CalificacionEstudiante;
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

        if( $rol === "ADMINISTRADOR"){
            $grupos = Grupos_academico::all();
            return view('admin.calificaciones.index_administrador',compact('grupos'));
        } 

        if( $rol === "DOCENTE"){
            $docente = Auth::user()->docente;
            $grupos = Grupos_academico::where('docente_id',$docente->id)->get();
            return view('admin.calificaciones.index_docente',compact('grupos'));
        }

        if( $rol === "ESTUDIANTE"){
            $estudiante = Auth::user()->estudiante;
            $matriculas = $estudiante->matriculaciones()->with(['asignacionMaterias.grupo_academico.materia', 
            'asignacionMaterias.grupo_academico.docente.usuario'])->get();
            return view('admin.calificaciones.index_estudiante', compact('estudiante','matriculas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $grupo = Grupos_academico::find($id);
        $calificaciones = Calificacion::with('grupoAcademico','detalleCalificaciones.estudiante')->where('grupo_academico_id', $id)->get();
        $asignaciones = AsignacionMateria::with('matriculacion.estudiante')
        ->where('grupo_academico_id',$id)
        ->get();
        return view('admin.calificaciones.create',compact('calificaciones','asignaciones','id','grupo'));
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
            'tipo' => 'required',
            'fecha' => 'required',
            'nota' => 'required',
            'estudiante_id' => 'required',
        ]);
        $calificacion = new Calificacion();
        $calificacion->grupo_academico_id = $request->grupo_academico_id;
        $calificacion->tipo = $request->tipo;
        $calificacion->descripcion = $request->descripcion;
        $calificacion->fecha = $request->fecha;
        $calificacion->save();

        foreach($request->estudiante_id as $index => $estudianteId){
            CalificacionEstudiante::create([
                'calificacion_id' => $calificacion->id,
                'estudiante_id' => $estudianteId,
                'nota' => $request->nota[$index],
            ]);
        }
        return redirect()->back()
                ->with('mensaje',' Se Registro la Calificacion de la Manera Correcta')
                ->with('icono','success');
    }

    public function show_admin($id)
    {
        $grupo = Grupos_academico::find($id);
        $calificaciones = Calificacion::with('grupoAcademico','detalleCalificaciones.estudiante')->where('grupo_academico_id', $id)->get();
        $asignaciones = AsignacionMateria::with('matriculacion.estudiante')
            ->where('grupo_academico_id', $id)
            ->get();
        return view('admin.calificaciones.show_admin', compact('calificaciones', 'asignaciones', 'id','grupo'));
    }

    public function show_estudiante($id,$grupoAcademicoId)
    {
        $calificaciones = CalificacionEstudiante::with(['calificacion.grupoAcademico.materia','estudiante','calificacion.grupoAcademico.docente.usuario'])
        ->where('estudiante_id', $id)
        ->whereHas('calificacion', function($query) use($grupoAcademicoId){
            $query->where('grupo_academico_id', $grupoAcademicoId);
        })->get();
        return view('admin.calificaciones.show_estudiante', compact('calificaciones', 'id'));
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
    public function destroy( $id)
    {
        $calificacion = Calificacion::find($id);
        $calificacion->delete();

        return redirect()->back()
                ->with('mensaje',' Se Elimino la Calificacion de la Manera Correcta')
                ->with('icono','success');
    }
}
