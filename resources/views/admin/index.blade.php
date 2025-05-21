@extends('adminlte::page')


@section('content_header')
    <h1>Dashboard</h1>
    <hr>
@stop

@section('content')
    <div class="row">


        @can('admin.gestiones.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Gestiones Registrados</b></span>
                        <span class="info-box-number">{{ $total_gestiones }} Gestiones</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan


        @can('admin.carreras.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/diploma.gif') }}" width="70px" alt="">

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Carreras Registradas</b></span>
                        <span class="info-box-number">{{ $total_carreras }} Carreas</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.niveles.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/grafico-de-linea.gif') }}" width="70px" alt="">

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Niveles Registrados</b></span>
                        <span class="info-box-number">{{ $total_niveles }} Niveles</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.turnos.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/tiempo.gif') }}" width="70px" alt="">

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Turnos Registrados</b></span>
                        <span class="info-box-number">{{ $total_turnos }} Turnos</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.paralelos.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/carpetas.gif') }}" width="70px" alt="">

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Paralelos Registrados</b></span>
                        <span class="info-box-number">{{ $total_paralelos }} Paralelos</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.periodos.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/completar.gif') }}" width="70px" alt="">

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Periodos Registrados</b></span>
                        <span class="info-box-number">{{ $total_periodos }} Periodos</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.materias.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/materias.gif') }}" width="70px" alt="">

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Materias Registrados</b></span>
                        <span class="info-box-number">{{ $total_materias }} Materias</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.roles.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/roles.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Roles Registrados</b></span>
                        <span class="info-box-number">{{ $total_roles }} Roles</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.administrativos.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/administrativos.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Administrativos Registrados</b></span>
                        <span class="info-box-number">{{ $total_administrativos }} Administrativos</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.docentes.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/docente.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Docentes Registrados</b></span>
                        <span class="info-box-number">{{ $total_docentes }} Docentes</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.estudiantes.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/estudiantes.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Estudiantes Registrados</b></span>
                        <span class="info-box-number">{{ $total_estudiantes }} Estudiantes</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.pagos.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/pago.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Pagos Registrados</b></span>
                        <span class="info-box-number">Total Pagado: {{ $total_pagos }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan


    </div>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
