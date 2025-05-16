<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Matriculacion;
use App\Models\Pago;
use Illuminate\Http\Request;

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
        $matriculas = Matriculacion::where('estudiante_id',$id)->get();
        return response()->json($matriculas);
        //$pagos = Pago::all();
        //$estudiantes = Estudiante::all();
        //return view('admin.pagos.index',compact('pagos','estudiantes'));
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
        //
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
    public function destroy(Pago $pago)
    {
        //
    }
}
