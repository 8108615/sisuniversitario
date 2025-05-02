@extends('adminlte::page')


@section('content_header')
    <h1>Horarios/Editar Horario</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Grupo Academico</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Buscar Grupo Academico
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Datos del Docente</h4>
                                        <hr>
                                        <div id="datos_docente" style="display: block">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Nombres</label>
                                                                <p id="nombres">{{ $horario->grupoAcademico->docente->nombres }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Apellidos</label>
                                                                <p id="apellidos">{{ $horario->grupoAcademico->docente->apellidos }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">CI</label>
                                                                <p id="ci">{{ $horario->grupoAcademico->docente->ci }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Fecha de Nacimiento</label>
                                                                <p id="fecha_nacimiento">{{ $horario->grupoAcademico->docente->fecha_nacimiento }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Telefono</label>
                                                                <p id="telefono">{{ $horario->grupoAcademico->docente->telefono }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Profesion</label>
                                                                <p id="profesion">{{ $horario->grupoAcademico->docente->profesion }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <p id="email">{{ $horario->grupoAcademico->docente->usuario->email }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Direccion</label>
                                                                <p id="direccion">{{ $horario->grupoAcademico->docente->direccion }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="{{ url($horario->grupoAcademico->docente->foto) }}" id="foto_docente" width="60%"
                                                        alt="fotografia del docente">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>




                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos para el Grupo Academico</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Gestion Academica</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $horario->grupoAcademico->gestion->nombre }}" name="" id="gestion_id"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nivel Academico</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $horario->grupoAcademico->nivel->nombre }}" name="" id="nivel_id"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Carrera</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $horario->grupoAcademico->carrera->nombre }}" name="" id="carrera_id"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Periodo Academico</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $horario->grupoAcademico->periodo->nombre }}" name="" id="periodo_id"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Materia</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $horario->grupoAcademico->materia->nombre }}" name="" id="materia_id"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Turnos</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $horario->grupoAcademico->turno->nombre }}" name="" id="turno_id"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Paralelos</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $horario->grupoAcademico->paralelo->nombre }}" name="" id="paralelo_id"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Nro Cupos</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="cupo_maximo"
                                                id="cupo_maximo"value="{{ $horario->grupoAcademico->cupo_maximo }}" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Horario</h3>

                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/horarios/' . $horario->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="grupo_academico_id" value="{{ $horario->grupoAcademico->id }}" id="grupo_academico_id" hidden>
                                            <label>Dia</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-calendar-day"></i></span>
                                                </div>
                                                <select name="dia" class="form-control" required>
                                                    <option value="">Seleccione un Dia</option>
                                                    <option value="Lunes" {{ 'Lunes' == $horario->dia ? 'selected' : '' }}>Lunes</option>
                                                    <option value="Martes" {{ 'Martes' == $horario->dia ? 'selected' : '' }}>Martes</option>
                                                    <option value="Miercoles" {{ 'Miercoles' == $horario->dia ? 'selected' : '' }}>Miercoles</option>
                                                    <option value="Jueves" {{ 'Jueves' == $horario->dia ? 'selected' : '' }}>Jueves</option>
                                                    <option value="Viernes" {{ 'Viernes' == $horario->dia ? 'selected' : '' }}>Viernes</option>
                                                    <option value="Sabado" {{ 'Sabado' == $horario->dia ? 'selected' : '' }}>Sabado</option>
                                                </select>
                                            </div>
                                            @error('dia')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Aula</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-door-open"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $horario->aula }}" name="aula" placeholder="Ej: A-101" required>
                                            </div>
                                            @error('aula')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hora de Inicio</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <input type="time" value="{{ $horario->hora_inicio }}" class="form-control" name="hora_inicio" required>
                                            </div>
                                            @error('hora_inicio')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hora de Finalizacion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <input type="time" value="{{ $horario->hora_fin }}" class="form-control" name="hora_fin" required>
                                            </div>
                                            @error('hora_fin')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                <hr>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ url('/admin/horarios') }}" class="btn btn-secondary"> Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </div>
                            </form>

                        </div>
                    </div>
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
                            @foreach ($gruposAcademicos as $grupoAcademico)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td>{{ $grupoAcademico->docente->apellidos . ' ' . $grupoAcademico->docente->nombres }}</td>
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
                                            <button class="btn btn-info btn_seleccionar"
                                                data-id="{{ $grupoAcademico->id }}"
                                                data-dismiss="modal">Seleccionar</button>

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
                        $('#nombres').html(grupoAcademico.docente.nombres);
                        $('#apellidos').html(grupoAcademico.docente.apellidos);
                        $('#ci').html(grupoAcademico.docente.ci);
                        $('#fecha_nacimiento').html(grupoAcademico.docente.fecha_nacimiento);
                        $('#telefono').html(grupoAcademico.docente.telefono);
                        $('#profesion').html(grupoAcademico.docente.profesion);
                        $('#direccion').html(grupoAcademico.docente.direccion);
                        $('#email').html(grupoAcademico.docente.usuario.email);
                        $('#grupo_academico_id').val(grupoAcademico.id);
                        $('#foto_docente').attr('src', grupoAcademico.foto_url).show();

                        $('#gestion_id').val(grupoAcademico.gestion.nombre);
                        $('#nivel_id').val(grupoAcademico.nivel.nombre);
                        $('#carrera_id').val(grupoAcademico.carrera.nombre);
                        $('#periodo_id').val(grupoAcademico.periodo.nombre);
                        $('#materia_id').val(grupoAcademico.materia.nombre);
                        $('#turno_id').val(grupoAcademico.turno.nombre);
                        $('#paralelo_id').val(grupoAcademico.paralelo.nombre);
                        $('#cupo_maximo').val(grupoAcademico.cupo_maximo);
                    },
                    error: function() {
                        alert("No se pudo Obtener la informaciono del Docente");
                    }
                });
            }


        });
    </script>

    <script>
        $(function() {
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
