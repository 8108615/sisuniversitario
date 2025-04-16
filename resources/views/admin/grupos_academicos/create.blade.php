@extends('adminlte::page')


@section('content_header')
    <h1>Grupos Academicos/Registro de un Nuevo Grupo Academico</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
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
                                        <option value="{{ $docente->id }}">{{ $docente->apellidos." ".$docente->nombres." - ".$docente->ci}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="datos_docente" style="display: none">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <p id="nombres"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Apellidos</label>
                                                <p id="apellidos"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">CI</label>
                                                <p id="ci"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Fecha de Nacimiento</label>
                                                <p id="fecha_nacimiento"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Telefono</label>
                                                <p id="telefono"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Profesion</label>
                                                <p id="profesion"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <p id="email"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Direccion</label>
                                                <p id="direccion"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="" id="foto_docente" width="60%" alt="fotografia del docente">
                                </div>
                            </div>
                        </div>
                        
                    
                    
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Llene los Datos del Formulario para la Matriculacion</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/grupos_academicos/create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="text" id="docente_id" name="docente_id" hidden>
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
                                                        <option value="{{ $gestion->id }}">{{ $gestion->nombre }}</option>
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
                                                        <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
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
                                                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
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
                                                        <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
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
                                                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
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
                                                        <option value="{{ $turno->id }}">{{ $turno->nombre }}</option>
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
                                                        <option value="{{ $paralelo->id }}">{{ $paralelo->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Nro Cupos</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="cupo_maximo" id="cupo_maximo" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ url('/admin/matriculaciones') }}" class="btn btn-secondary"> Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Formacion Academica</h3>
                        </div>
                        <div class="card-body">
                            <div id="tabla_historial"></div>
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
                    }else{
                        $('#tabla_historial').html('<p> No hay Formacion Academica Registrado de Docente</p>').show();
                    }

                    

                },error:function(){
                    alert("No se pudo Obtener la informaciono del Docente");
                }
            });
        }
    })
</script>
@stop
