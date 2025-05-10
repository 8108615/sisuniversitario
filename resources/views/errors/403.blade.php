@extends('adminlte::page')

@section('title','403 - Acceso No Autorizado')

@section('content_header')
    <center>
        <h1><b>403 - Acceso No Autorizado</b></h1>
    </center>
    <hr>
@stop
@section('content')
<br><br>
<div class="text-center">
    <img src="{{ url('/img/403.jpeg') }}" width="400px" alt="">
    <h3>No tiene Permiso Para Acceder a Esta Pagina.</h3>
    <p>Por Favor, Contactese con el Administrador si cree que esto es un error.</p>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>
</div>
@stop