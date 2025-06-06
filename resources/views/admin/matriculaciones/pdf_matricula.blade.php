<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matricula</title>
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
    <table border="0" style="font-size: 8pt;">
        <tr>
            <td style="text-align: center">
                <img src="{{ url($configuracion->logo) }}" alt="Logo" width="100%"> <br>
                <b>{{ $configuracion->nombre }}</b><br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->email }} <br>
            </td>
            <td style="width: 400px"></td>
            <td>
                <img src="{{ $barcodePNG }}" style="width: 200px; height: 50px; display:block; margin:0 auto:">
                <div style="text-align: center; font-family: monospace; margin-top:5px;">
                    CI: {{ $matricula->estudiante->ci }}
                </div>
                
            </td>
        </tr>
    </table>
    <h3 style="text-align: center"><b><u>MATRICULA DEL ESTUDIANTE</u></b></h3>


    <table border="0" cellpadding="3">
        <tr>
            <td><b>Gestion: </b></td>
            <td style="width: 300px">{{ $matricula->gestion->nombre }}</td>
            <td style="width: 200px"></td>
            <td rowspan="4">
                <img src="{{ url($matricula->estudiante->foto) }}" alt="Logo" width="120"> <br>
            </td>
        </tr>
        <tr>
            <td><b>Nivel: </b></td>
            <td>{{ $matricula->nivel->nombre }}</td>
        </tr>
        <tr>
            <td><b>Periodo: </b></td>
            <td>{{ $matricula->periodo->nombre }}</td>
        </tr>
        <tr>
            <td><b>Carrera: </b></td>
            <td>{{ $matricula->carrera->nombre }}</td>
        </tr>
    </table>


    <table border="0" style=" width:100%; margin-top:10px; text-align: center;">
        <tr>
            <td><b>{{ $matricula->estudiante->apellidos }}</b><br>------------------------- <br> Apellidos</td>
            <td><b>{{ $matricula->estudiante->nombres }}</b><br>------------------------- <br> Nombres</td>
            <td><b>{{ $matricula->estudiante->ci }}</b><br>------------------------- <br> Carnet de Identidad</td>
        </tr>
    </table>

    <br>

    <p style="text-align: center"><b><u>MATERIAS ASIGNADAS</u></b></p>
    <table class=" table table-bordered" cellpadding="6" style="width: 100%; font-size:8pt;">
        <tr style="text-align: center; background-color:#f2f2f2">
            <td><b>Nro</b></td>
            <td><b>Materias</b></td>
            <td><b>Codigo</b></td>
            <td><b>Turno</b></td>
            <td><b>Paralelo</b></td>
        </tr>
        @php
            $contador = 1;
            
        @endphp
        @foreach ($asignacionMaterias as $datos)
            <tr>
                <td style="text-align: center">{{ $contador++ }}</td>
                <td>{{ $datos->grupo_academico->materia->nombre }}</td>
                <td>{{ $datos->grupo_academico->materia->codigo }}</td>
                <td style="text-align: center">{{ $datos->grupo_academico->turno->nombre }}</td>
                <td style="text-align: center">{{ $datos->grupo_academico->paralelo->nombre }}</td>
            </tr>
            
            
        @endforeach
    </table>
    <span style="font-size: 9pt">Santa Cruz de Sierra, @php echo now()->translatedFormat('j \d\e F \d\e\l Y'); @endphp, Impreson por: {{ Auth::user()->name }}</span>

        <br><br><br><br><br><br><br><br>
        <table border="0" style="width: 100%; text-align:center;">
            <tr>
                <td>
                    ________________________________ <br> Directora/or Academico
                </td>
                <td>
                    ________________________________ <br> Directora/or General
                </td>
            </tr>
        </table>    
</body>
</html>