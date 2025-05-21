@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Grupos Academicos Asignados </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Grupos Registrados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="text-align: center">Nro</th>
                            <th style="text-align: center">Gestion</th>
                            <th style="text-align: center">Nivel</th>
                            <th style="text-align: center">Periodo</th>
                            <th style="text-align: center">Carrera</th>
                            <th style="text-align: center">Materia</th>
                            <th style="text-align: center">Turno</th>
                            <th style="text-align: center">Paralelo</th>
                            <th style="text-align: center">Cupo Maximo</th>
                            <th style="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach ($grupos as $grupo )
                            <tr>
                                <td style="text-align: center">{{ $contador++ }}</td>
                                <td>{{ $grupo->gestion->nombre }}</td>
                                <td>{{ $grupo->nivel->nombre }}</td>
                                <td>{{ $grupo->periodo->nombre }}</td>
                                <td>{{ $grupo->carrera->nombre }}</td>
                                <td>{{ $grupo->materia->nombre }}</td>
                                <td>{{ $grupo->turno->nombre }}</td>
                                <td>{{ $grupo->paralelo->nombre }}</td>
                                <td>{{ $grupo->cupo_maximo }}</td>
                                <td>
                                    <a href="{{ url('/admin/asistencias/create') }}" class="btn btn-success"><i class="fas fa-list"></i> Tomar Asistencia</a>
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Grupos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Grupos",
                    "infoFiltered": "(Filtrado de _MAX_ total Grupos)",
                    "lengthMenu": "Mostrar _MENU_ Grupos",
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
    </script>
@stop
