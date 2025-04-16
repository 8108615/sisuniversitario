@extends('adminlte::page')


@section('content_header')
    <h1>Matriculaciones/Registro de una Nueva Matriculacion</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del Estudiante</h3>
                </div>
                <div class="card-body">
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Buscar Estudiante:</label>
                                    <select name="" id="buscar_estudiante" class="form-control select2">
                                        <option value="">Buscar...</option>
                                        @foreach($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->apellidos." ".$estudiante->nombres." - ".$estudiante->ci}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="datos_estudiante" style="display: none">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Ref. Celular</label>
                                                <p id="ref_celular"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Parentesco</label>
                                                <p id="parentesco"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                    <img src="" id="foto_estudiante" width="60%" alt="fotografia del estudiante">
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
                            <form action="{{ url('admin/matriculaciones/create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="text" id="estudiante_id" name="estudiante_id" hidden>
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
                            <h3 class="card-title"> Historial Academico</h3>
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

    $('#buscar_estudiante').on('change',function(){
        var id = $(this).val();

        if(id){
            $.ajax({
                url: "{{ url('/admin/matriculaciones/buscar_estudiante/') }}" + '/' +id,
                type: 'GET',
                success: function(estudiante){
                    $('#nombres').html(estudiante.nombres);
                    $('#apellidos').html(estudiante.apellidos);
                    $('#ci').html(estudiante.ci);
                    $('#fecha_nacimiento').html(estudiante.fecha_nacimiento);
                    $('#telefono').html(estudiante.telefono);
                    $('#profesion').html(estudiante.profesion);
                    $('#ref_celular').html(estudiante.ref_celular);
                    $('#parentesco').html(estudiante.parentesco);
                    $('#direccion').html(estudiante.direccion);
                    $('#email').html(estudiante.usuario.email);
                    $('#foto_estudiante').attr('src',estudiante.foto_url).show();
                    $('#datos_estudiante').css('display','block');
                    $('#historial_academico').css('display','block');
                    $('#estudiante_id').val(estudiante.id);
                    if(estudiante.matriculaciones && estudiante.matriculaciones.length > 0){
                        var tabla = '<table class="table table-bordered">';
                            tabla+= '<thead><tr><th>Gestion</th><th>Nivel</th><th>Carrera</th><th>Periodo</th></tr></thead>';
                            tabla+= '<tbody>';
                                estudiante.matriculaciones.forEach(function (matriculacion){
                                    tabla+='<tr>';
                                    tabla+='<td>' + matriculacion.gestion.nombre + '</td>';
                                    tabla+='<td>' + matriculacion.nivel.nombre + '</td>';
                                    tabla+='<td>' + matriculacion.carrera.nombre + '</td>';
                                    tabla+='<td>' + matriculacion.periodo.nombre + '</td>';
                                    tabla+='</tr>';
                                })
                            tabla+= '</table>';
                        $('#tabla_historial').html(tabla).show();
                    }else{
                        $('#tabla_historial').html('<p> No hay Historial Academico Registrado de Estudiante</p>').show();
                    }

                    

                },error:function(){
                    alert("No se pudo Obtener la informaciono del Estudiante");
                }
            });
        }
    })
</script>
@stop
