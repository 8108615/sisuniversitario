@extends('adminlte::page')

@section('content_header')
    <h3><b>Calificaciones del Estudiante : <br>
        </b></h3>
    <hr>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Calificaciones Registrados
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr style="background-color: #b6ccf0;text-align:center">
                                <th>Nro</th>
                                <th>Docente</th>
                                <th>Materia</th>
                                <th>Tipo de Calificacion</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $nro = 1;
                                $totalNotas = 0;
                                $cantidadNotas = count($calificaciones)
                            @endphp
                                @foreach ($calificaciones as $calificacionEstudiante )
                                    <tr>
                                        <td style="text-align: center">{{ $nro++ }}</td>
                                        <td>{{ $calificacionEstudiante->calificacion->grupoAcademico->docente->apellidos }} 
                                            {{ $calificacionEstudiante->calificacion->grupoAcademico->docente->nombres }}</td>
                                        <td>{{ $calificacionEstudiante->calificacion->grupoAcademico->materia->nombre }}</td>
                                        <td>{{ $calificacionEstudiante->calificacion->tipo }}</td>
                                        <td>{{ $calificacionEstudiante->calificacion->descripcion }}</td>
                                        <td>{{ $calificacionEstudiante->calificacion->fecha }}</td>
                                        <td style="text-align: center;background-color:#b6ccf0">{{ $calificacionEstudiante->nota }}</td>
                                    </tr>
                                    @php 
                                        $totalNotas += $calificacionEstudiante->nota;
                                    @endphp
                                @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="background-color: #e7f0b6;text-align:center">
                                <th colspan="6">Promedio del Estudiante: </th>
                                <th style="background-color: #e7f0b6;text-align:center">
                                    @if ($cantidadNotas > 0)
                                        {{ number_format($totalNotas / $cantidadNotas, 2) }}
                                    @else
                                        Sin Calificaciones
                                    @endif
                                </th>
                            </tr>
                        </tfoot>
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
