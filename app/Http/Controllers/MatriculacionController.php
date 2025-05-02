<?php

namespace App\Http\Controllers;

use App\Models\AsignacionMateria;
use App\Models\Carrera;
use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grupos_academico;
use App\Models\Materia;
use App\Models\Matriculacion;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupoAcademicos = Grupos_academico::with('materia','turno','paralelo','horarios')->get();
        $matriculaciones = Matriculacion::with('estudiante','gestion','nivel','periodo','carrera')->get();
        $materias = Materia::all();
        $turnos = Turno::all();
        $paralelos = Paralelo::all();
        $asignacionMaterias = AsignacionMateria::with('materia','turno','paralelo')->get();
        //return response()->json($matriculaciones);
        return view('admin.matriculaciones.index',compact('matriculaciones','materias','turnos','paralelos','asignacionMaterias','grupoAcademicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $estudiantes = Estudiante::all();
        $periodos = Periodo::all();
        $carreras = Carrera::all();
        return view('admin.matriculaciones.create',compact('estudiantes','gestiones','niveles','periodos','carreras'));
    }

    public function buscar_estudiante($id){
        $estudiante = Estudiante::with('usuario','matriculaciones.gestion','matriculaciones.nivel','matriculaciones.periodo','matriculaciones.carrera')->find($id);
        if(!$estudiante){
            return response()->json(['error'=>'Estudiante no Encontrado']);
        }

        $estudiante->foto_url = url($estudiante->foto);
        return response()->json($estudiante);

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'estudiante_id' => 'required',
            'gestion_id' =>'required',
            'nivel_id' =>'required',
            'carrera_id' =>'required',
            'periodo_id' =>'required',
        ]);

        $matriculacion = new Matriculacion();
        $matriculacion->estudiante_id = $request->estudiante_id;
        $matriculacion->gestion_id = $request->gestion_id;
        $matriculacion->nivel_id = $request->nivel_id;
        $matriculacion->periodo_id = $request->periodo_id;
        $matriculacion->carrera_id = $request->carrera_id;
        $matriculacion->fecha_matriculacion = now();
        $matriculacion->save();

        return redirect()->route('admin.matriculaciones.index')
                ->with('mensaje','Matriculacion Registrado Correctamente')
                ->with('icono','success');
    }

    public function pdf_matricula($id){

        $configuracion = Configuracion::first();
        $matricula = Matriculacion::with('estudiante', 'gestion', 'nivel', 'periodo', 'carrera')->find($id);
        $asignacionMaterias = AsignacionMateria::with('materia','turno','paralelo')->where('matriculacion_id',$matricula->id)->get();
        $barcodePNG = 'data:image/png;base64,' .DNS1D::getBarcodePNG($matricula->estudiante->ci, 'C128', 1,33);



        $pdf = Pdf::loadView('admin.matriculaciones.pdf_matricula', compact('configuracion', 'matricula','barcodePNG','asignacionMaterias'));
        $pdf->setPaper('letter', 'portrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->setOptions(['isHtml5ParserEnabled' => true]);
        $pdf->setOptions(['isRemoteEnabled'=> true]);
        return $pdf->stream('matriculas.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matriculacion $matriculacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $matriculacion = Matriculacion::with('estudiante','gestion','nivel','periodo','carrera')->find($id);
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $estudiantes = Estudiante::all();
        $periodos = Periodo::all();
        $carreras = Carrera::all();
        return view('admin.matriculaciones.edit',compact('matriculacion','gestiones','niveles','estudiantes','periodos','carreras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'estudiante_id' => 'required',
            'gestion_id' =>'required',
            'nivel_id' =>'required',
            'carrera_id' =>'required',
            'periodo_id' =>'required',
        ]);

        $matriculacion = Matriculacion::find($id);
        $matriculacion->estudiante_id = $request->estudiante_id;
        $matriculacion->gestion_id = $request->gestion_id;
        $matriculacion->nivel_id = $request->nivel_id;
        $matriculacion->periodo_id = $request->periodo_id;
        $matriculacion->carrera_id = $request->carrera_id;
        //$matriculacion->fecha_matriculacion = now();
        $matriculacion->save();

        return redirect()->route('admin.matriculaciones.index')
                ->with('mensaje','Matriculacion Actualizado Correctamente')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matricula = Matriculacion::find($id);
        $matricula->delete();

        return redirect()->route('admin.matriculaciones.index')
                ->with('mensaje','Matriculacion Eliminada Correctamente')
                ->with('icono','success');
    }
}
