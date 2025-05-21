<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Matriculacion;
use App\Models\Pago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::all();
        $estudiantes = Estudiante::all();
        return view('admin.pagos.index',compact('pagos','estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function ver_pagos($id)
    {
        $estudiante = Estudiante::find($id);
        $matriculas = Matriculacion::with('estudiante')->where('estudiante_id',$id)->get();
        //return response()->json($matriculas);
        //$pagos = Pago::all();
        //$estudiantes = Estudiante::all();
        return view('admin.pagos.ver_pagos',compact('estudiante','matriculas'));
    }
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
            'matricula_id' =>'required',
            'monto' =>'required',
            'metodo_pago' =>'required',
            'descripcion' =>'required',
            'fecha_pago' =>'required',
        ]);

        $pago = new Pago();
        $pago->matriculacion_id = $request->matricula_id;
        $pago->monto = $request->monto;
        $pago->metodo_pago = $request->metodo_pago;
        $pago->descripcion = $request->descripcion;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->save();

        return redirect()->back()
                ->with('mensaje','Pago Registrado Correctamente')
                ->with('icono','success');
    }

    public function comprobante($id)
    {
        $configuracion = Configuracion::first();
        $pago = Pago::find($id);
        $matriculacion = Matriculacion::with('estudiante')->find($pago->matriculacion_id);
        $estudiante = Estudiante::find($matriculacion->estudiante_id);
        $pdf = Pdf::loadView('admin.pagos.comprobante', compact('configuracion','pago','matriculacion','estudiante'));
        $pdf->setPaper('letter', 'portrait');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->setOptions(['isHtml5ParserEnabled' => true]);
        $pdf->setOptions(['isRemoteEnabled'=> true]);
        return $pdf->stream('comprobante_de_pago.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pago = Pago::find($id);
        $pago->delete();

        return redirect()->back()
                ->with('mensaje','Matriculacion Eliminada Correctamente')
                ->with('icono','success');
    }
}
