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
    <h2>REGISTROS DE CUADERNOS MEDICOS</h2>
    <table>
        <tr>
            <th>Usuario: </th>
            <td> {{ $user->perfil->nombres }}  {{ $user->perfil->apellido_paterno }}  {{ $user->perfil->apellido_materno }}</td>
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
                <th>E. civil</th>
                <th>d</th>
                <th>0-4</th>
                <th>5-13</th>
                <th>14-19</th>
                <th>20-59</th>
                <th>60></th>
                <th>diagnostico</th>
                <th>ficha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cuadernos as $c)
            <tr>
                <td>{{ $c->fecha }}</td>
                <td>
                    {{ $c->paciente->perfil->apellido_paterno }} {{ $c->paciente->perfil->apellido_materno }} {{ $c->paciente->perfil->nombres }}
                </td>
                <td>{{ $c->paciente->perfil->estado_civil }}</td>
                <td>{{ $c->dato }}</td>
                <td>
                    @if ($c->edad>=0&&$c->edad<=4)
                        {{ $c->edad }}
                    @endif
                </td>
                <td>
                    @if ($c->edad>=5&&$c->edad<=13)
                    {{ $c->edad }}
                    @endif
                </td>
                <td>
                    @if ($c->edad>=14&&$c->edad<=19)
                    {{ $c->edad }}
                    @endif
                </td>
                <td>
                    @if ($c->edad>=20&&$c->edad<=59)
                    {{ $c->edad }}
                    @endif
                </td>
                <td>
                    @if ($c->edad>=60)
                    {{ $c->edad }}
                    @endif
                </td>
                <td>{!! $c->diagnostico !!}</td>
                <td>{{ $c->nro_ficha }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>