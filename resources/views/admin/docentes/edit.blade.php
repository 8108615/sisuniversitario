@extends('adminlte::page')


@section('content_header')
    <h1>Personal Docente/Modificar Datos del Personal Docente</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"> Llene los Datos del Formulario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/docentes',$docente->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre del Rol</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" id="" class="form-control" style="pointer-events: none">
                                            @foreach ($roles as $rol)
                                                @if($rol->name == 'DOCENTE')
                                                    <option value="{{ $rol->name }}" {{ $rol->name == 'DOCENTE' ? 'selected':''}}>{{ $rol->name }}</option>
                                                @else
                                                    <option value="">No Exite el Rol DOCENTE</option>
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
                                            value="{{ old('nombres',$docente->nombres) }}" placeholder="Escriba aqui..." required>
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
                                            value="{{ old('apellidos',$docente->apellidos) }}" placeholder="Escriba aqui..." required>
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
                                            value="{{ old('ci',$docente->ci) }}" placeholder="Escriba aqui..." required>
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
                                            id="fecha_nacimiento" value="{{ old('fecha_nacimiento',$docente->fecha_nacimiento) }}"
                                            placeholder="Escriba aqui..." required>
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
                                            value="{{ old('telefono',$docente->telefono) }}" placeholder="Escriba aqui..." required>
                                    </div>
                                    @error('telefono')
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
                                            value="{{ old('email',$docente->usuario->email) }}" placeholder="Escriba aqui..." required>
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
                                            value="{{ old('profesion',$docente->profesion) }}" placeholder="Escriba aqui..." required>
                                    </div>
                                    @error('profesion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Direccion</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            value="{{ old('direccion',$docente->direccion) }}" placeholder="Escriba aqui..." required>
                                    </div>
                                    @error('direccion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" id="file" class="form-control" name="foto">
                                    </div>
                                    <center>
                                        <output id="list">
                                            <img src="{{ url($docente->foto) }}" width="250px" alt="">
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
                                    <a href="{{ url('/admin/docentes') }}" class="btn btn-secondary"> Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
