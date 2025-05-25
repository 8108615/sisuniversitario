@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Asistencia del Grupo Academico </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Asistencias registrados</h3>

                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tomar Asistencia
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #17a2b8">
                                        <h5 class="modal-title" id="exampleModalLabel">Estudiantes del Grupo Academico</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/admin/asistencias/create') }}" method="POST">
                                            @csrf
                                            <input type="text" name="grupo_academico_id" value="{{ $id }}"
                                                hidden>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Fecha de la Asistencia</label>
                                                        <input type="date" name="fecha" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Observacion(opcional)</label>
                                                        <input type="text" name="observacion" class="form-control"
                                                            placeholder="Observacion">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Estudiantes</label>
                                                    <table
                                                        class="table table-bordered table-condensed table-hover table-striped table-sm">
                                                        <tr>
                                                            <th style="text-align: center">Nro</th>
                                                            <th style="text-align: center">Nombre</th>
                                                            <th style="text-align: center">Apellidos</th>
                                                            <th style="text-align: center">Cedula</th>
                                                            <th style="text-align: center">Asistencia</th>
                                                        </tr>
                                                        @foreach ($asignaciones as $asignacion)
                                                            <tr>
                                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                                <td>{{ $asignacion->matriculacion->estudiante->nombres }}
                                                                </td>
                                                                <td>{{ $asignacion->matriculacion->estudiante->apellidos }}
                                                                </td>
                                                                <td>{{ $asignacion->matriculacion->estudiante->ci }}</td>
                                                                <td style="text-align: center">
                                                                    <input type="radio"
                                                                        name="criterio[{{ $asignacion->matriculacion->estudiante->id }}]"
                                                                        value="presente" required> Presente
                                                                    <input type="radio"
                                                                        name="criterio[{{ $asignacion->matriculacion->estudiante->id }}]"
                                                                        value="licencia" required> Licencia
                                                                    <input type="radio"
                                                                        name="criterio[{{ $asignacion->matriculacion->estudiante->id }}]"
                                                                        value="falta" required> Falta
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Regitrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th style="text-align: center">Nro</th>
                                <th style="text-align: center">Grupo Academico</th>
                                <th style="text-align: center">Fecha</th>
                                <th style="text-align: center">Observacion</th>
                                <th style="text-align: center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp
                            @foreach ($asistencias as $asistencia)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td>{{ $asistencia->grupoAcademico->materia->nombre }}</td>
                                    <td>{{ $asistencia->fecha }}</td>
                                    <td>{{ $asistencia->observacion }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-asistencia{{ $asistencia->id }}">
                                                <i class="fas fa-list"></i> Ver Asistencia
                                            </button>
                                            <form
                                                action="{{ url('/admin/asistencias', $asistencia->id) }}"
                                                method="post" onclick="preguntar1{{ $asistencia->id }}(event)"
                                                id="miFormulario1{{ $asistencia->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i> Eliminar Asistencia</button>
                                            </form>
                                            <script>
                                                function preguntar1{{ $asistencia->id }}(event) {
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
                                                            var form = $('#miFormulario1{{ $asistencia->id }}');
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-asistencia{{ $asistencia->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #17a2b8">
                                                        <h5 class="modal-title" id="exampleModalLabel"> Asistencia
                                                            Registrados</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Fecha de la Asistencia</label>
                                                                    <p>{{ $asistencia->fecha }}</p>
                                                                </div>
                                                            </div>
                                                            @if (!($asistencia->observacion == null))
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="">Observacion</label>
                                                                        <p>{{ $asistencia->observacion }}</p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="col-md-12">
                                                                <label for="">Estudiantes</label>
                                                                <table
                                                                    class="table table-bordered table-condensed table-hover table-striped table-sm">
                                                                    <tr>
                                                                        <th style="text-align: center">Nro</th>
                                                                        <th style="text-align: center">Nombre</th>
                                                                        <th style="text-align: center">Apellidos</th>
                                                                        <th style="text-align: center">Cedula</th>
                                                                        <th style="text-align: center">Asistencia</th>
                                                                    </tr>
                                                                    @foreach ($asistencia->detalleAsistencias as $detalle)
                                                                        <tr>
                                                                            <td style="text-align: center">
                                                                                {{ $loop->iteration }}</td>
                                                                            <td>{{ $detalle->estudiante->nombres }}
                                                                            </td>
                                                                            <td>{{ $detalle->estudiante->apellidos }}
                                                                            </td>
                                                                            <td>{{ $detalle->estudiante->ci }}
                                                                            </td>
                                                                            <td style="text-align: center">
                                                                                @if ($detalle->estado == 'presente')
                                                                                    <span
                                                                                        class="badge badge-success">Presente</span>
                                                                                @elseif($detalle->estado == 'licencia')
                                                                                    <span
                                                                                        class="badge badge-warning">Licencia</span>
                                                                                @else
                                                                                    <span
                                                                                        class="badge badge-danger">Falta</span>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </table>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <hr>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancelar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Regitrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
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
            justify-content: center;
            /* Centrar los botones */
            gap: 10px;
            /* Espaciado entre botones */
            margin-bottom: 15px;
            /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #example1_wrapper .btn {
            color: #fff;
            /* Color del texto en blanco */
            border-radius: 4px;
            /* Bordes redondeados */
            padding: 5px 15px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-default {
            background-color: #6e7176;
            color: #212529;
            border: none;
        }
    </style>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Asistencias",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Asistencias",
                    "infoFiltered": "(Filtrado de _MAX_ total Asistencias)",
                    "lengthMenu": "Mostrar _MENU_ Asistencias",
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
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copy',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csv',
                        className: 'btn btn-info'
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning'
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>
@stop
