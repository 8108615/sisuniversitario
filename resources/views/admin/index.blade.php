@extends('adminlte::page')


@section('content_header')
    <h1>Dashboard</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Gestiones Registrados</b></span>
                    <span class="info-box-number">{{ $total_gestiones }} Gestiones</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <img src="{{ url('/img/diploma.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Carreras Registradas</b></span>
                    <span class="info-box-number">{{ $total_carreras }} Carreas</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <img src="{{ url('/img/grafico-de-linea.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Niveles Registrados</b></span>
                    <span class="info-box-number">{{ $total_niveles }} Niveles</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <img src="{{ url('/img/tiempo.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Turnos Registrados</b></span>
                    <span class="info-box-number">{{ $total_turnos }} Turnos</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <img src="{{ url('/img/carpetas.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Paralelos Registrados</b></span>
                    <span class="info-box-number">{{ $total_paralelos }} Paralelos</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <img src="{{ url('/img/completar.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Periodos Registrados</b></span>
                    <span class="info-box-number">{{ $total_periodos }} Periodos</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <img src="{{ url('/img/materias.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Materias Registrados</b></span>
                    <span class="info-box-number">{{ $total_materias }} Materias</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
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
