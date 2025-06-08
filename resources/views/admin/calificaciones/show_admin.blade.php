@extends('adminlte::page')

@section('content_header')
    <h3><b>Listado de Calificaciones del Grupo Academico : <br>
        </b></h3>

    <h4>
        Calificaciones Registrados de
        Gestion: {{ $grupo->gestion->nombre }} - Nivel: {{ $grupo->nivel->nombre }} - Periodo: {{ $grupo->periodo->nombre }}
        - Carrera : {{ $grupo->carrera->nombre }} - Materia: {{ $grupo->materia->nombre }} - Turno:
        {{ $grupo->turno->nombre }} -
        Paralelo: {{ $grupo->paralelo->nombre }}
    </h4>
    <hr>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Estudiante del Grupo Academico
                    </h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr style="background-color: #b6ccf0;text-align:center">
                                <th>Nro</th>
                                <th>Estudiante</th>
                                <th>C.I.</th>
                                @foreach ($calificaciones as $calificacion )
                                    <th>{{ $calificacion->tipo }}<br><small>{{ $calificacion->fecha }}</small></th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $nro = 1; @endphp
                                @foreach ($asignaciones as $asignacion )
                                    @php
                                        $est = $asignacion->matriculacion->estudiante;
                                        $notas = [];
                                    @endphp
                                    <tr>
                                        <td style="text-align: center">{{ $nro++ }}</td>
                                        <td>{{ $est->nombres }} {{ $est->apellidos }}</td>
                                        <td>{{ $est->ci }}</td>

                                        @foreach ($calificaciones as $calificacion )
                                            @php
                                                $detalle = $calificacion->detalleCalificaciones
                                                            ->firstWhere('estudiante_id', $est->id);
                                                $nota = $detalle ? $detalle->nota : '-';
                                                $notas[] = is_numeric($nota) ? floatval($nota) : null;
                                            @endphp
                                            <td style="text-align: center">
                                                {{ $nota }}
                                            </td>
                                        @endforeach

                                        @php
                                            $promedio = collect($notas)->filter()->avg();
                                        @endphp
                                        <td style="text-align: center;background-color:#b6ccf0">
                                            <b>{{ number_format($promedio, 2) }}</b>
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
