@extends('adminlte::page')


@section('content_header')
    <h1>Grupos Academicos/Edicion de Datos del Grupo Academico</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Datos del Docente</h3>
                </div>
                <div class="card-body">
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Buscar Docente:</label>
                                    <select name="" style="width: 100%" id="buscar_docente" class="form-control select2">
                                        <option value="">Buscar...</option>
                                        @foreach($docentes as $docente)
                                        <option value="{{ $docente->id }}"
                                            {{ old('docente_id', $docente->id) == $grupoAcademico->docente_id ? 'selected' : '' }}
                                            >{{ $docente->apellidos." ".$docente->nombres." - ".$docente->ci}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="datos_docente" style="display: block">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <p id="nombres">{{ $grupoAcademico->docente->nombres }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Apellidos</label>
                                                <p id="apellidos">{{ $grupoAcademico->docente->apellidos }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">CI</label>
                                                <p id="ci">{{ $grupoAcademico->docente->ci }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Fecha de Nacimiento</label>
                                                <p id="fecha_nacimiento">{{ $grupoAcademico->docente->fecha_nacimiento }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Telefono</label>
                                                <p id="telefono">{{ $grupoAcademico->docente->telefono }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Profesion</label>
                                                <p id="profesion">{{ $grupoAcademico->docente->profesion }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <p id="email">{{ $grupoAcademico->docente->usuario->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Direccion</label>
                                                <p id="direccion">{{ $grupoAcademico->docente->direccion }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ url($grupoAcademico->docente->foto) }}" id="foto_docente" width="60%" alt="fotografia del docente">
                                </div>
                            </div>
                        </div>
                        
                    
                    
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> Llene los Datos del Formulario para la Matriculacion</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/grupos_academicos/' . $grupoAcademico->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="text" id="docente_id" value="{{ $grupoAcademico->docente_id }}" name="docente_id" hidden>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Gestion Academica</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                                                </div>
                                                <select name="gestion_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione la Gestion Academica...</option>
                                                    @foreach($gestiones as $gestion)
                                                        <option value="{{ $gestion->id }}"
                                                            {{ old('gestion_id', $gestion->id) == $grupoAcademico->gestion_id ? 'selected' : '' }}
                                                            >{{ $gestion->nombre }}</option>
                                                    @endforeach
                                                </select>
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
                                                <select name="nivel_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione el Academico...</option>
                                                    @foreach($niveles as $nivel)
                                                        <option value="{{ $nivel->id }}"
                                                            {{ old('nivel_id', $nivel->id) == $grupoAcademico->nivel_id ? 'selected' : '' }}>
                                                            {{ $nivel->nombre }}</option>
                                                    @endforeach
                                                </select>
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
                                                <select name="carrera_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione una Carrera...</option>
                                                    @foreach($carreras as $carrera)
                                                        <option value="{{ $carrera->id }}"
                                                            {{ old('carrera_id', $carrera->id) == $grupoAcademico->carrera_id ? 'selected' : '' }}
                                                            >{{ $carrera->nombre }}</option>
                                                    @endforeach
                                                </select>
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
                                                <select name="periodo_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione el Periodo Academico...</option>
                                                    @foreach($periodos as $periodo)
                                                        <option value="{{ $periodo->id }}"
                                                            {{ old('periodo_id', $periodo->id) == $grupoAcademico->periodo_id ? 'selected' : '' }}
                                                            >{{ $periodo->nombre }}</option>
                                                    @endforeach
                                                </select>
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
                                                <select name="materia_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione Materia...</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{ $materia->id }}"
                                                            {{ old('materia_id', $materia->id) == $grupoAcademico->materia_id ? 'selected' : '' }}
                                                            >{{ $materia->nombre }}</option>
                                                    @endforeach
                                                </select>
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
                                                <select name="turno_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione Turno...</option>
                                                    @foreach($turnos as $turno)
                                                        <option value="{{ $turno->id }}"
                                                            {{ old('turno_id', $turno->id) == $grupoAcademico->turno_id ? 'selected' : '' }}
                                                            >{{ $turno->nombre }}</option>
                                                    @endforeach
                                                </select>
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
                                                <select name="paralelo_id" id="" class="form-control select2" required>
                                                    <option value="">Seleccione Paralelo...</option>
                                                    @foreach($paralelos as $paralelo)
                                                        <option value="{{ $paralelo->id }}"
                                                            {{ old('paralelo_id', $paralelo->id) == $grupoAcademico->paralelo_id ? 'selected' : '' }}
                                                            >{{ $paralelo->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Nro Cupos</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" value="{{ $grupoAcademico->cupo_maximo }}" name="cupo_maximo" id="cupo_maximo" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ url('/admin/grupos_academicos') }}" class="btn btn-secondary"> Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="historial_academico" style="display: none">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> Formacion Academica</h3>
                        </div>
                        <div class="card-body">
                            <div id="tabla_historial"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="historial_academico_pre" style="display: block">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> Formacion Academica</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Institucion</th>
                                        <th>Nivel</th>
                                        <th>Año de Graduacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($grupoAcademico->docente->formacion as $formacion)
                                        <tr>
                                            <td>{{ $formacion->titulo }}</td>
                                            <td>{{ $formacion->institucion }}</td>
                                            <td>{{ $formacion->nivel }}</td>
                                            <td>{{ $formacion->ano_graduacion }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


@stop

@section('css')
    <style>
        .select2-container .select2-selection--single{
            height: 40px !important;
        }
    </style>
@stop

@section('js')
<script>
    $('.select2').select2({ })

    $('#buscar_docente').on('change',function(){
        var id = $(this).val();

        if(id){
            $.ajax({
                url: "{{ url('/admin/grupos_academicos/buscar_docente/') }}" + '/' +id,
                type: 'GET',
                success: function(docente){
                    console.log(docente);
                    
                    $('#nombres').html(docente.nombres);
                    $('#apellidos').html(docente.apellidos);
                    $('#ci').html(docente.ci);
                    $('#fecha_nacimiento').html(docente.fecha_nacimiento);
                    $('#telefono').html(docente.telefono);
                    $('#profesion').html(docente.profesion);
                    $('#direccion').html(docente.direccion);
                    $('#email').html(docente.usuario.email);
                    $('#foto_docente').attr('src',docente.foto_url).show();
                    $('#datos_docente').css('display','block');
                    $('#historial_academico').css('display','block');
                    $('#docente_id').val(docente.id);

                    if(docente.formacion && docente.formacion.length > 0){
                        var tabla = '<table class="table table-bordered">';
                            tabla+= '<thead><tr><th>Titulo</th><th>Institucion</th><th>Nivel</th><th>Año de Graduacion:</th></tr></thead>';
                            tabla+= '<tbody>';
                                docente.formacion.forEach(function (item){
                                    tabla+='<tr>';
                                    tabla+='<td>' + item.titulo + '</td>';
                                    tabla+='<td>' + item.institucion + '</td>';
                                    tabla+='<td>' + item.nivel + '</td>';
                                    tabla+='<td>' + item.ano_graduacion + '</td>';
                                    tabla+='</tr>';
                                })
                            tabla+= '</table>';
                        $('#tabla_historial').html(tabla).show();
                        $('#historial_academico_pre').css('display','none');
                        
                    }else{
                        $('#historial_academico_pre').css('display','none');
                        $('#tabla_historial').html(
                            '<p> No hay Formacion Academica Registrado de Docente</p>').show();
                    }

                    

                },error:function(){
                    alert("No se pudo Obtener la informaciono del Docente");
                }
            });
        }
    })
</script>
@stop
