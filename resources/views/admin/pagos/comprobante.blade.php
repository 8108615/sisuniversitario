<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante de Pago</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #000000;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
        }

        .table-bordered thead th {
            border-bottom-width: 2px;
        }
    </style>
</head>

<body>
    <table border="0" style="font-size: 6pt;">
        <tr>
            <td style="text-align: center">
                <img src="{{ url($configuracion->logo) }}" alt="Logo" width="30%"> <br>
                <b>{{ $configuracion->nombre }}</b><br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->email }} <br>
            </td>
            <td style="width: 400px"></td>
            <td><b><h1>ORIGINAL</h1></b></td>

        </tr>
    </table>
    <h3 style="text-align: center"><b><u>Comprobante de Pago # {{ $pago->id }}</u></b></h3>
    <b>Datos del Estudiante</b>
    <hr>
    <table border="0" cellpadding="6" style="width: 100%">
        <tr>
            <td colspan="2" style="text-align: center">
                <b>Estudiantes: </b> <br>
                {{ $estudiante->nombres . ' ' . $estudiante->apellidos }} <br>
            </td>
            <td colspan="2" style="text-align: center">
                <b>CI: </b> <br>
                {{ $estudiante->ci }} <br>
            </td>
        </tr>
    </table>
    <hr>
    <b>Datos de la Matricula</b>
    <table cellpadding="6" style="width: 100%">
        <tr>
            <td>
                <b>Gestion: </b> <br>
                {{ $matriculacion->gestion->nombre }}
            </td>
            <td>
                <b>Nivel: </b> <br>
                {{ $matriculacion->nivel->nombre }}
            </td>
            <td>
                <b>Periodo: </b> <br>
                {{ $matriculacion->periodo->nombre }}
            </td>
            <td>
                <b>Carrera: </b> <br>
                {{ $matriculacion->carrera->nombre }}
            </td>
        </tr>
    </table>
    <hr>
    <b>Datos del Pago</b>
    <table class="table table-bordered" cellpadding="6" style="width: 100%">
        <thead>
            <tr>
                <th style="text-align: center">Monto</th>
                <th style="text-align: center">Metodo de Pago</th>
                <th style="text-align: center">Descripcion</th>
                <th style="text-align: center">Fecha de Pago</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center">{{ $pago->monto }}</td>
                <td style="text-align: center">{{ $pago->metodo_pago }}</td>
                <td style="text-align: center">{{ $pago->descripcion }}</td>
                <td style="text-align: center">{{ $pago->fecha_pago }}</td>
            </tr>
        </tbody>
    </table>
    
    <span>----------------------------------------------------------------------------------------------------------------------------------------</span>
    <table border="0" style="font-size: 6pt;">
        <tr>
            <td style="text-align: center">
                <img src="{{ url($configuracion->logo) }}" alt="Logo" width="30%"> <br>
                <b>{{ $configuracion->nombre }}</b><br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->email }} <br>
            </td>
            <td style="width: 400px"></td>
            <td><b><h1>COPIA</h1></b></td>

        </tr>
    </table>
    <h3 style="text-align: center"><b><u>COMPROBANTE DE PAGO # {{ $pago->id }}</u></b></h3>
    <b>Datos del Estudiante</b>
    <hr>
    <table border="0" cellpadding="6" style="width: 100%">
        <tr>
            <td colspan="2" style="text-align: center">
                <b>Estudiantes: </b> <br>
                {{ $estudiante->nombres . ' ' . $estudiante->apellidos }}
            </td>
            <td colspan="2" style="text-align: center">
                <b>CI: </b> <br>
                {{ $estudiante->ci }}
            </td>
        </tr>
    </table>
    <hr>
    <b>Datos de la Matricula</b>
    <table cellpadding="6" style="width: 100%">
        <tr>
            <td>
                <b>Gestion: </b> <br>
                {{ $matriculacion->gestion->nombre }}
            </td>
            <td>
                <b>Nivel: </b> <br>
                {{ $matriculacion->nivel->nombre }}
            </td>
            <td>
                <b>Periodo: </b> <br>
                {{ $matriculacion->periodo->nombre }}
            </td>
            <td>
                <b>Carrera: </b> <br>
                {{ $matriculacion->carrera->nombre }}
            </td>
        </tr>
    </table>
    <hr>
    <b>Datos del Pago</b>
    <table class="table table-bordered" cellpadding="6" style="width: 100%">
        <thead>
            <tr>
                <th style="text-align: center">Monto</th>
                <th style="text-align: center">Metodo de Pago</th>
                <th style="text-align: center">Descripcion</th>
                <th style="text-align: center">Fecha de Pago</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center">{{ $pago->monto }}</td>
                <td style="text-align: center">{{ $pago->metodo_pago }}</td>
                <td style="text-align: center">{{ $pago->descripcion }}</td>
                <td style="text-align: center">{{ $pago->fecha_pago }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
