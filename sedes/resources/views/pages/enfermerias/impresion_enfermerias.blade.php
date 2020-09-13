<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuaderno medico</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif; 
            font-size: .7em;       
        }
        table {
            border-collapse: collapse;
            width: 100%;
            
        }

        th, td {
            text-align: left;
           /*padding: 8px;*/
            padding: .5px;
            border: .5px solid #c5c5c5;
            text-align: center
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4CAF50;
            color: white;
        }
        #cabecera{
            display: inline-block;
        }
        #logo{
            height: 90px;
        }
        #izquierda {
            float:left;
            width:20%;
        }
        
        #derecha {
            float:left;
            width:80%;
            text-align: center;
        }
        #cuerpo{
            margin-top: 100px;
        }
        .espacio_chequeo{
            padding: 1px;
        }
        </style>
</head>
<body>
    <h2>REGISTROS DE ENFERMERIAS</h2>
    <table>
        <tr>
            <th>Desde:</th>
            <td>{{ $inicio }}</td>
            <th>Hasta:</th>
            <td>{{ $fin }}</td>
        </tr>
    </table>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Dirección</th>
                <th>Ocupacion</th>
                <th>Doctor</th>
                <th>detalle</th>
                <th>atendido por</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enfermerias as $en)
                    @php
                       $doc=App\User::find($en->doctor_id);
                    @endphp
                <tr>
                    <td>{{ $en->fecha }}</td>
                    <td>{{ $en->paciente->perfil->apellido_paterno }} {{ $en->paciente->perfil->apellido_materno }} {{ $en->paciente->perfil->nombres }}</td>
                    <td>{{ $en->edad }}</td>
                    <td>{{ $en->paciente->perfil->sexo }}</td>
                    <td>{{ $en->paciente->perfil->direccion }}</td>
                    <td>{{ $en->paciente->perfil->ocupacion }}</td>
                    <td>{{ $doc->perfil->apellido_paterno }} {{ $doc->perfil->apellido_materno }} {{ $doc->perfil->nombres }}</td>
                    <td>{{ $en->detalle }}</td>
                    <td>{{ $en->user->perfil->apellido_paterno }} {{ $en->user->perfil->apellido_materno }} {{ $en->user->perfil->nombres }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>