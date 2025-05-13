@extends('adminlte::page')

@section('content_header')
    <h1><b>Permisos del Rol - {{ $rol->name }} </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Permisos Registrados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @foreach ($permisos as $modulo => $grupoPermisos)
                                    <div class="col-md-3">
                                        <h3>{{ $modulo }}</h3>
                                        @foreach ($grupoPermisos as $permiso)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="permisos[]"
                                            value="{{ $permiso->id }}" {{ $rol->hasPermissionTo($permiso->name) ? 'checked' : '' }}>
                                            <label for="" class="form-check-label">{{ $permiso->name }}</label>
                                        </div>
                                        @endforeach
                                        <br>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
