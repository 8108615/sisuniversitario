@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Estudiantes Matriculados </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Matriculaciones registradas</h3>

                    <div class="card-tools">
                        <a href="{{url('/admin/matriculaciones/create')}}" class="btn btn-primary"> Crear nuevo</a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="text-align: center">Nro</th>
                            <th style="text-align: center">Estudiante</th>
                            <th style="text-align: center">CI del Estudiante</th>
                            <th style="text-align: center">Gestion</th>
                            <th style="text-align: center">Nivel</th>
                            <th style="text-align: center">Periodo</th>
                            <th style="text-align: center">Carrera</th>
                            <th style="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach($matriculaciones as $matriculacione)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td style="text-align: center">{{ $matriculacione->estudiante->apellidos. ' '.$matriculacione->estudiante->nombres }}</td>
                                <td style="text-align: center">{{ $matriculacione->estudiante->ci }}</td>
                                <td style="text-align: center">{{ $matriculacione->gestion->nombre }}</td>
                                <td style="text-align: center">{{ $matriculacione->nivel->nombre }}</td>
                                <td style="text-align: center">{{ $matriculacione->periodo->nombre }}</td>
                                <td style="text-align: center">{{ $matriculacione->carrera->nombre }}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $matriculacione->id }}">
                                            Asignar Materias <i class="fas fa-list"></i>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $matriculacione->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #17a2b8; color:white">
                                                <h5 class="modal-title" id="exampleModalLabel">Asignacion de Materias</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Materias Registradas en la Matricula</h4>
                                                    <div class="row">
                                                        <table class="table table-bordered table-hover table-striped table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nro</th>
                                                                    <th>Materia</th>
                                                                    <th>Codigo</th>
                                                                    <th>Turno</th>
                                                                    <th>Paralelo</th>
                                                                    <th>Nota Final</th>
                                                                    <th>Accion</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $contador = 1;
                                                                @endphp
                                                                @foreach($asignacionMaterias as $asignacionMateria)
                                                                    @if($asignacionMateria->matriculacion_id == $matriculacione->id)
                                                                     <tr>
                                                                        <td>{{ $contador++ }}</td>
                                                                        <td>{{ $asignacionMateria->materia->nombre }}</td>
                                                                        <td>{{ $asignacionMateria->materia->codigo }}</td>
                                                                        <td>{{ $asignacionMateria->turno->nombre }}</td>
                                                                        <td>{{ $asignacionMateria->paralelo->nombre }}</td>
                                                                        <td>{{ $asignacionMateria->materia->nota_final }}</td>
                                                                        <td>
                                                                            <form action="{{url('/admin/matriculaciones/asignar_materia',$asignacionMateria->id)}}" method="post"
                                                                                onclick="preguntar1{{$asignacionMateria->id}}(event)" id="miFormulario1{{$asignacionMateria->id}}">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                                          </form>
                                                                          <script>
                                                                              function preguntar1{{$asignacionMateria->id}}(event) {
                                                                                  event.preventDefault();
                                                                                  Swal.fire({
                                                                                      title: '¿Desea eliminar esta registro?',
                                                                                      text: '',
                                                                                      icon: 'question',
                                                                                      showDenyButton: true,
                                                                                      confirmButtonText: 'Eliminar',
                                                                                      confirmButtonColor: '#a5161d',
                                                                                      denyButtonColor: '#270a0a',
                                                                                      denyButtonText: 'Cancelar',
                                                                                  }).then((result) => {
                                                                                      if (result.isConfirmed) {
                                                                                          var form = $('#miFormulario1{{$asignacionMateria->id}}');
                                                                                          form.submit();
                                                                                      }
                                                                                  });
                                                                              }
                                                                          </script>
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                @endforeach
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <hr>
                                                    <br><br>
                                                    <hr>
                                                    <table id="example2" class="table table-bordered table-hover table-striped table-sm">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center">Nro</th>
                                                            <th style="text-align: center">Docente</th>
                                                            <th style="text-align: center">Gestion</th>
                                                            <th style="text-align: center">Nivel</th>
                                                            <th style="text-align: center">Periodo</th>
                                                            <th style="text-align: center">Carrera</th>
                                                            <th style="text-align: center">Materia</th>
                                                            <th style="text-align: center">Turno</th>
                                                            <th style="text-align: center">Paralelo</th>
                                                            <th style="text-align: center">Cupos</th>
                                                            <th style="text-align: center">Horarios</th>
                                                            <th style="text-align: center">Acción</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $contador = 1;
                                                        @endphp
                                                        @foreach($grupoAcademicos as $grupoAcademico)
                                                            @if ($grupoAcademico->carrera_id == $matriculacione->carrera_id && $grupoAcademico->periodo_id == $matriculacione->periodo_id && $grupoAcademico->nivel_id == $matriculacione->nivel_id && $grupoAcademico->gestion_id == $matriculacione->gestion_id)
                                                            <tr>
                                                                <td style="text-align: center">{{$contador++}}</td>
                                                                <td>{{ $grupoAcademico->docente->apellidos.' '.$grupoAcademico->docente->nombres }}</td>
                                                                <td>{{ $grupoAcademico->gestion->nombre }}</td>
                                                                <td>{{ $grupoAcademico->nivel->nombre }}</td>
                                                                <td>{{ $grupoAcademico->periodo->nombre }}</td>
                                                                <td>{{ $grupoAcademico->carrera->nombre }}</td>
                                                                <td>{{ $grupoAcademico->materia->nombre }}</td>
                                                                <td>{{ $grupoAcademico->turno->nombre }}</td>
                                                                <td>{{ $grupoAcademico->paralelo->nombre }}</td>
                                                                <td>{{ $grupoAcademico->cupo_maximo }}</td>
                                                                <td>
                                                                    @foreach($grupoAcademico->horarios as $horario)
                                                                        <p style="margin: 0px; padding: 0px;">{{ $horario->dia }}: {{ $horario->hora_inicio }} - {{ $horario->hora_fin }}</p>
                                                                    @endforeach
                                                                </td>
                                                                <td style="text-align: center">
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a href="{{url('/admin/grupos_academicos/'.$grupoAcademico->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                                        
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <form action="{{ url('/admin/matriculaciones/asignar_materia/create') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="matriculacion_id" value="{{ $matriculacione->id }}">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <label for="">Materias</label>
                                                                <select name="materia_id" id="" class="form-control" required>
                                                                    <option value="">Seleccione una Materia</option>
                                                                    @foreach($materias as $materia)
                                                                    @if($matriculacione->carrera_id == $materia->carrera_id)
                                                                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Turnos</label>
                                                                <select name="turno_id" id="" class="form-control" required>
                                                                    <option value="">Seleccione un Turno</option>
                                                                    @foreach($turnos as $turno)
                                                                        <option value="{{ $turno->id }}">{{ $turno->nombre }}</option> 
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="">Paralelos</label>
                                                                <select name="paralelo_id" id="" class="form-control" required>
                                                                    <option value="">Seleccione...</option>
                                                                    @foreach($paralelos as $paralelo)
                                                                        <option style="text-align: center" value="{{ $paralelo->id }}">{{ $paralelo->nombre }}</option> 
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div style="height: 34px"></div>
                                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </form>
                                                    

                                                    
                                                    <br>
                                                    
                                                </div>
                                            </div>
                                            </div>
                                        </div>
  



                                        <a href="{{url('/admin/matriculaciones/'.$matriculacione->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{url('/admin/matriculaciones',$matriculacione->id)}}" method="post"
                                              onclick="preguntar{{$matriculacione->id}}(event)" id="miFormulario{{$matriculacione->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$matriculacione->id}}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Desea eliminar esta registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$matriculacione->id}}');
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>
                                        <a href="{{url('/admin/matriculaciones/pdf/'.$matriculacione->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center; /* Centrar los botones */
            gap: 10px; /* Espaciado entre botones */
            margin-bottom: 15px; /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #example1_wrapper .btn {
            color: #fff; /* Color del texto en blanco */
            border-radius: 4px; /* Bordes redondeados */
            padding: 5px 15px; /* Espaciado interno */
            font-size: 14px; /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger { background-color: #dc3545; border: none; }
        .btn-success { background-color: #28a745; border: none; }
        .btn-info { background-color: #17a2b8; border: none; }
        .btn-warning { background-color: #ffc107; color: #212529; border: none; }
        .btn-default { background-color: #6e7176; color: #212529; border: none; }
    </style>
@stop

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Matriculaciones",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Matriculaciones",
                    "infoFiltered": "(Filtrado de _MAX_ total Matriculaciones)",
                    "lengthMenu": "Mostrar _MENU_ Matriculaciones",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [
                    { text: '<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className: 'btn btn-default' },
                    { text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-danger' },
                    { text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-info' },
                    { text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-success' },
                    { text: '<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className: 'btn btn-warning' }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });

        $(function () {
            $("#example2").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Grupo Academicos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Grupo Academicos",
                    "infoFiltered": "(Filtrado de _MAX_ total Grupo Academicos)",
                    "lengthMenu": "Mostrar _MENU_ Grupo Academicos",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                
            }).buttons().container().appendTo('#example2_wrapper .row:eq(0)');
        });
    </script>
@stop
