@extends('adminlte::page')


@section('content_header')
    <h1>Horarios/Registro de un Nuevo Horario</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del Grupo Academico</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                            Buscar Grupo Academico
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <!-- Button trigger modal -->


                                <!-- Modal -->


                            </div>
                        </div>
                    </div>
                    <hr>




                </div>
            </div>
        </div>



    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Grupos Academicos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example1" class="table table-bordered table-hover table-striped table-sm">
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
                            <th style="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach($gruposAcademicos as $grupoAcademico)
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
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-info btn_seleccionar" data-id="{{ $grupoAcademico->id }}">Seleccionar</button>
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
    </style>
@stop

@section('js')

<script>
    $('.btn_seleccionar').click(function() {
        var id = $(this).data('id');
        if (id) {
                $.ajax({
                    url: "{{ url('/admin/horarios/buscar_grupo_academico/') }}" + '/' + id,
                    type: 'GET',
                    success: function(grupoAcademico) {
                        console.log(grupoAcademico);

                        


                    },
                    error: function() {
                        alert("No se pudo Obtener la informaciono del Docente");
                    }
                });
            }
        
        
    });
</script>

<script>
    $(function () {
        $("#example1").DataTable({
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
            
        }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
    });
</script>


    <script>
        $('.select2').select2({})

        $('#buscar_docente').on('change', function() {
            var id = $(this).val();

            if (id) {
                $.ajax({
                    url: "{{ url('/admin/grupos_academicos/buscar_docente/') }}" + '/' + id,
                    type: 'GET',
                    success: function(docente) {
                        console.log(docente);

                        $('#nombres').html(docente.nombres);
                        $('#apellidos').html(docente.apellidos);
                        $('#ci').html(docente.ci);
                        $('#fecha_nacimiento').html(docente.fecha_nacimiento);
                        $('#telefono').html(docente.telefono);
                        $('#profesion').html(docente.profesion);
                        $('#direccion').html(docente.direccion);
                        $('#email').html(docente.usuario.email);
                        $('#foto_docente').attr('src', docente.foto_url).show();
                        $('#datos_docente').css('display', 'block');
                        $('#historial_academico').css('display', 'block');
                        $('#docente_id').val(docente.id);

                        if (docente.formacion && docente.formacion.length > 0) {
                            var tabla = '<table class="table table-bordered">';
                            tabla +=
                                '<thead><tr><th>Titulo</th><th>Institucion</th><th>Nivel</th><th>Año de Graduacion:</th></tr></thead>';
                            tabla += '<tbody>';
                            docente.formacion.forEach(function(item) {
                                tabla += '<tr>';
                                tabla += '<td>' + item.titulo + '</td>';
                                tabla += '<td>' + item.institucion + '</td>';
                                tabla += '<td>' + item.nivel + '</td>';
                                tabla += '<td>' + item.ano_graduacion + '</td>';
                                tabla += '</tr>';
                            })
                            tabla += '</table>';
                            $('#tabla_historial').html(tabla).show();
                        } else {
                            $('#tabla_historial').html(
                                '<p> No hay Formacion Academica Registrado de Docente</p>').show();
                        }



                    },
                    error: function() {
                        alert("No se pudo Obtener la informaciono del Docente");
                    }
                });
            }
        })
    </script>
@stop
