<?php

namespace App\Http\Controllers;

use App\Models\AsignacionMateria;
use Illuminate\Http\Request;

class AsignacionMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'matriculacion_id' => 'required',
            'grupo_academico_id' =>'required',
            
        ]);

        $asignacionExistente = AsignacionMateria::where('matriculacion_id', $request->matriculacion_id)
        ->where('grupo_academico_id', $request->grupo_academico_id)
        ->first();
        
        if($asignacionExistente){
            return redirect()->route('admin.matriculaciones.index')
                ->with('mensaje', 'Ya existe una asignacion del Grupo Academico para esta Matriculacion')
                ->with('icono', 'error');
        }

        $asignacionMateria = new AsignacionMateria();
        $asignacionMateria->matriculacion_id = $request->matriculacion_id;
        $asignacionMateria->grupo_academico_id = $request->grupo_academico_id;
        $asignacionMateria->estado = 'activo';
        $asignacionMateria->fecha_asignacion = now();
        
        $asignacionMateria->save();

        return redirect()->route('admin.matriculaciones.index')
                ->with('mensaje','Se Asigno la Materia de la Manera Correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(AsignacionMateria $asignacionMateria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsignacionMateria $asignacionMateria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsignacionMateria $asignacionMateria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asignacionMateria = AsignacionMateria::findOrFail($id);
        $asignacionMateria->delete();

        return redirect()->route('admin.matriculaciones.index')
                ->with('mensaje','Se Elimino la Asignacion de Materia de la Manera Correcta')
                ->with('icono','success');
    }
}
