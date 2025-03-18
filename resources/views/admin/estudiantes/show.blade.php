@extends('adminlte::page')


@section('content_header')
    <h1>Estudiantes/Datos del Estudiantes</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre del Rol</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" id="" class="form-control" style="pointer-events: none" disabled>
                                            @foreach ($roles as $rol)
                                                @if($rol->name == 'ESTUDIANTE')
                                                    <option value="{{ $rol->name }}" {{ $rol->name == 'ESTUDIANTE' ? 'selected':''}}>{{ $rol->name }}</option>
                                                @else
                                                    <option value="">No Exite el Rol ESTUDIANTE</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('rol')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombres" id="nombres"
                                            value="{{ old('nombres',$estudiante->nombre) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('nombres')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friend"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                                            value="{{ old('apellidos',$estudiante->apellidos) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('apellidos')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ci">Cedula de Identidad</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ci" id="ci"
                                            value="{{ old('ci',$estudiante->ci) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('ci')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_nacimiento"
                                            id="fecha_nacimiento" value="{{ old('fecha_nacimiento',$estudiante->fecha_nacimiento) }}"
                                            placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('ci')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="telefono" id="telefono"
                                            value="{{ old('telefono',$estudiante->telefono) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('telefono')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ref_celular">Ref Celular</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ref_celular" id="ref_celular"
                                            value="{{ old('ref_celular',$estudiante->ref_celular) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('ref_celular')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parentesco">Parentesco</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friend"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="parentesco" id="parentesco"
                                            value="{{ old('parentesco',$estudiante->parentesco) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('parentesco')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email',$estudiante->usuario->email) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('email')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="profesion">Profesion</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="profesion" id="profesion"
                                            value="{{ old('profesion',$estudiante->profesion) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('profesion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Direccion</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            value="{{ old('direccion',$estudiante->direccion) }}" placeholder="Escriba aqui..." disabled>
                                    </div>
                                    @error('direccion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        
                                    </div>
                                    <center>
                                        <output id="list">
                                            <img src="{{ url($estudiante->foto) }}" width="250px" alt="">
                                        </output>
                                    </center>
                                    @error('foto')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <script>
                                    function archivo(evt){
                                        var files = evt.target.files;
                                        for(var i = 0, f; f = files[i]; i++){
                                            if(!f.type.match('image.*')){
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function (theFile) {
                                                return function (e) {
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                    document.getElementById('file').addEventListener('change', archivo, false);
                                </script>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/estudiantes') }}" class="btn btn-secondary"> Volver</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
