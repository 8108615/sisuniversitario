@extends('adminlte::page')


@section('content_header')
    <h1>Matriculaciones/Modificar Matriculacion</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
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
                                        <option value="{{ $estudiante->id }}"
                                            {{ old('buscar_estudiante', $estudiante->id) == $matriculacion->estudiante_id ? 'selected' : '' }}
                                            >{{ $estudiante->apellidos." ".$estudiante->nombres." - ".$estudiante->ci}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="datos_estudiante" style="display: block">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <p id="nombres">{{ $matriculacion->estudiante->nombres }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Apellidos</label>
                                                <p id="apellidos">{{ $matriculacion->estudiante->apellidos }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">CI</label>
                                                <p id="ci">{{ $matriculacion->estudiante->ci }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Fecha de Nacimiento</label>
                                                <p id="fecha_nacimiento">{{ $matriculacion->estudiante->fecha_nacimiento }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Telefono</label>
                                                <p id="telefono">{{ $matriculacion->estudiante->telefono }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Profesion</label>
                                                <p id="profesion">{{ $matriculacion->estudiante->profesion }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Ref. Celular</label>
                                                <p id="ref_celular">{{ $matriculacion->estudiante->ref_celular }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Parentesco</label>
                                                <p id="parentesco">{{ $matriculacion->estudiante->parentesco }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <p id="email">{{ $matriculacion->estudiante->usuario->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Direccion</label>
                                                <p id="direccion">{{ $matriculacion->estudiante->direccion }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ url($matriculacion->estudiante->foto) }}" id="foto_estudiante" width="60%" alt="fotografia del estudiante">
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
                            <form action="{{ url('admin/matriculaciones/' . $matriculacion->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="text" id="estudiante_id" value="{{ $matriculacion->estudiante_id }}" name="estudiante_id" hidden>
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
                                                            {{ old('gestion_id', $gestion->id) == $matriculacion->gestion_id ? 'selected' : '' }}
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
                                                            {{ old('nivel_id', $nivel->id) == $matriculacion->nivel_id ? 'selected' : '' }}
                                                            >{{ $nivel->nombre }}</option>
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
                                                            {{ old('carrera_id', $carrera->id) == $matriculacion->carrera_id ? 'selected' : '' }}
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
                                                            {{ old('periodo_id', $periodo->id) == $matriculacion->periodo_id ? 'selected' : '' }}
                                                            >{{ $periodo->nombre }}</option>
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
                            <h3 class="card-title"> Historial Academico</h3>
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
                            <h3 class="card-title"> Historial Academico</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Gestion</th>
                                        <th>Nivel</th>
                                        <th>Carrera</th>
                                        <th>Periodo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matriculacion->estudiante->matriculaciones as $matricula)
                                        <tr>
                                            <td>{{ $matricula->gestion->nombre }}</td>
                                            <td>{{ $matricula->nivel->nombre }}</td>
                                            <td>{{ $matricula->carrera->nombre }}</td>
                                            <td>{{ $matricula->periodo->nombre }}</td>
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
                        $('#historial_academico_pre').css('display','none');
                        
                    }else{
                        $('#historial_academico_pre').css('display','none');
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
