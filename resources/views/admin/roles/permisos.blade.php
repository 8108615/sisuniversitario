@extends('adminlte::page')

@section('content_header')
    <h1><b>Permisos del Rol </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Permisos Registrados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @php
                        $contador = 1;
                    @endphp
                    @foreach ($permisos as $permiso )
                        <ul>
                            <li>{{$contador++ ." - ".$permiso->name }}</li>
                        </ul>
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop
