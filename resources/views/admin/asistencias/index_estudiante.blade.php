@extends('adminlte::page')

@section('content_header')
    <h1><b>Asistencias del Estudiante: {{ $estudiante->apellidos . ' ' . $estudiante->nombres }} </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="accordion" id="accordionExample">
                @foreach ($matriculas as $matricula)
                    <div class="card">
                        <div class="card-header" style="background-color: #c3dde6" id="heading{{ $matricula->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collage"
                                    data-target="#collapse{{ $matricula->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $matricula->id }}">
                                    <b>
                                        {{ 'Matricula | ' . $matricula->gestion->nombre . ' | ' . $matricula->nivel->nombre . ' | ' . $matricula->periodo->nombre . ' | ' . $matricula->carrera->nombre }}
                                    </b>
                                </button>
                            </h2>
                        </div>
                        <div id="collapse{{ $matricula->id }}" class="collapse show"
                            aria-labelledby="heading{{ $matricula->id }}">
                            <div class="card-body">
                                <b>Materias Asignadas</b>
                                <!-- Button trigger modal -->
                                

                               

                                <hr>
                                <table class="table table-bordered table-striped table-hover table-sm" id="pagos_table">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Docente</th>
                                            <th>Materia</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contador = 1
                                        @endphp
                                        @foreach ($matricula->asignacionMaterias as $asignacion)
                                            <tr>
                                                <td style="text-align: center">{{ $contador++ }}</td>
                                                <td>{{ $asignacion->grupo_academico->docente->apellidos .' '.$asignacion->grupo_academico->docente->nombres }}</td>
                                                <td>{{ $asignacion->grupo_academico->materia->nombre }}</td>
                                                <td>
                                                    <a href="{{ url('/admin/asistencias/detalle_asistencia/estudiante/'.$estudiante->id.'/grupo_academico/'.$asignacion->grupo_academico->id) }}" class="btn btn-info"><i class="fas fa-list"></i> Ver Asistencias</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
