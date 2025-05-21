@extends('adminlte::page')

@section('content_header')
    <h1><b>Pagos del Estudiante - {{ $estudiante->apellidos . ' ' . $estudiante->nombres }} </b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="accordion" id="accordionExample">
                @foreach ($matriculas as $matricula)
                    <div class="card">
                        <div class="card-header" style="background-color: #c3dde6" id="heading{{ $matricula->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collage"
                                    data-target="#collapse{{ $matricula->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $matricula->id }}">
                                    <b>
                                        {{ 'Matricula | ' . $matricula->gestion->nombre . ' | ' . $matricula->nivel->nombre . ' | ' . $matricula->periodo->nombre . ' | ' . $matricula->carrera->nombre }}
                                    </b>
                                </button>
                            </h2>
                        </div>
                        <div id="collapse{{ $matricula->id }}" class="collapse show"
                            aria-labelledby="heading{{ $matricula->id }}">
                            <div class="card-body">
                                <b>Pagos Realizados</b>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
                                    data-target="#exampleModal{{ $matricula->id }}">
                                    <i class="fas fa-money-bill-wave"></i> Realizar Pago
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $matricula->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #c3dde6">
                                                <h5 class="modal-title" id="exampleModalLabel">Realizar Pago</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/pagos/create') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="matricula_id" value="{{ $matricula->id }}">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Monto</label>
                                                                <input type="number" class="form-control" id="monto" name="monto" placeholder="Monto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Metodo de Pago</label>
                                                                <select name="metodo_pago" class="form-control" id="">
                                                                    <option value="Efectivo">Efectivo</option>
                                                                    <option value="Transferencia">Transferencia</option>
                                                                    <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                                                    <option value="Tarjeta de Debito">Tarjeta de Debito</option>
                                                                    <option value="Cheque">Cheque</option>
                                                                    <option value="Otros">Otros</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Descripcion</label>
                                                                <textarea name="descripcion" class="form-control" id="" cols="30" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Fecha de Pago</label>
                                                                <input type="date" class="form-control" name="fecha_pago" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <table class="table table-bordered table-striped table-hover table-sm" id="pagos_table">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Monto</th>
                                            <th>Metodo de Pago</th>
                                            <th>Descripcion</th>
                                            <th>Fecha de Pago</th>
                                            <th>estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contador = 1
                                        @endphp
                                        @foreach ($matricula->pagos as $pago)
                                            <tr>
                                                <td style="text-align: center">{{ $contador++ }}</td>
                                                <td>{{ $pago->monto }}</td>
                                                <td>{{ $pago->metodo_pago }}</td>
                                                <td>{{ $pago->descripcion }}</td>
                                                <td>{{ $pago->fecha_pago }}</td>
                                                <td>{{ $pago->estado }}</td>
                                                <td>
                                                    <a href="{{ url('/admin/pagos/comprobante/'.$pago->id ) }}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                                    <form action="{{ url('/admin/pagos/' .$pago->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas Seguro de Eliminar este Pago?');"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
