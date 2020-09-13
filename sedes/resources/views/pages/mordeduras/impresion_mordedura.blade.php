<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.U.S.</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif; 
            font-size: .8em;       
        }
        table {
            border-collapse: collapse;
            width: 100%;
            
        }

        th, td {
            text-align: left;
           /*padding: 8px;*/
            padding: .5px;
            /*border: .5px solid #c5c5c5;*/
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
        #elem li{
            text-align: left
        }
        </style>
</head>
<body>
    <div id="cabecera">
        <div id="izquierda">
            <img src="{{ URL::to('logo_ministerio.jpg') }}" id="logo">
        </div>
        <div id="derecha">
            <p style="font-size: 12px">
                <br>
                <b>FICHA DE CASOS DE MORDEDURA</b>
            </p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td><h3><b>Caso No: </b>{{ $m->id }}</h3></td>
        </tr>
        <tr>
            <td><h3>Ficha de casos de mordedura</h3></td>
        </tr>
        <tr><td><h4>Paciente: {{ $m->nombre }}</h4></td></tr>
    </table>
    <hr>
    <table>
        <tr>
            <td>
                <ul id="elem">
                    <li style="list-style: none"><b>Municipio: </b>{{ $m->municipio }}</li>
                    <li style="list-style: none"><b>Establecimiento: </b>{{ $m->establecimiento }}</li>
                    <li style="list-style: none"><b>Direccion: </b>{{ $m->direccion }}</li>
                    <li style="list-style: none"><b>Sexo: </b>{{ $m->sexo }}</li>
                    <li style="list-style: none"><b>Edad: </b>{{ $m->edad }}</li>
                </ul>
            </td>
            <td>
                <ul id="elem">
                    <li style="list-style: none"><b>Fecha de mordedura: </b>{{ $m->fecha_mordedura }}</li>
                    <li style="list-style: none"><b>Donde fue mordido: </b>{{ $m->donde }}</li>
                    <li style="list-style: none"><b>Localización de la mordedura: </b>{{ $m->localizacion }}</li>
                    <li style="list-style: none"><b>Herida: </b>{{ $m->herida }}</li>
                    <li style="list-style: none"><b>Tipo de herida: </b>{{ $m->tipo_herida }}</li>
                </ul>
            </td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td>
                <ul id="elem">
                    <hr>
                    <h5>Datos del Animal</h5>
                    <li style="list-style: none"><b>Especie: </b>{{ $m->especie }}</li>
                    <li style="list-style: none"><b>Vacunacion anterior: </b>{{ $m->vacunacion_anterior }}</li>
                    <li style="list-style: none"><b>Fecha: </b>{{ $m->fecha_vacunacion_anterior }}</li>
                    <hr>
                    <h5>Datos del tratamiento del paciente</h5>
                    
                    <li style="list-style: none"><b>Tiene vacunacion antirrábica?: </b>{{ $m->vacuna_antirrabica }}</li>
                </ul>
            </td>
        </tr>
    </table>
    <hr><table class="table table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>Nro.</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Fecha</td>
                <td>
                    @isset($m->v1)
                        {{ $m->v1 }}
                    @else
                        
                    @endisset
                </td>
                <td>
                    @isset($m->v2)
                        {{ $m->v2 }}
                    @else
                        
                    @endisset
                </td>
                <td>
                    @isset($m->v3)
                        {{ $m->v3 }}
                    @else
                        
                    @endisset
                </td>
                <td>
                    @isset($m->v4)
                        {{ $m->v4 }}
                    @else
                        
                    @endisset
                </td>
                <td>
                    @isset($m->v5)
                        {{ $m->v5 }}
                    @else
                        
                    @endisset
                </td>
                <td>
                    @isset($m->v6)
                        {{ $m->v6 }}
                    @else
                        
                    @endisset
                </td>
                <td>
                    @isset($m->v7)
                        {{ $m->v7 }}
                    @else
                        
                    @endisset
                </td>

            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>10 Días</th>
                <th>20 Días</th>
                <th>30 Días</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    @isset($m->v10)
                        {{ $m->v10 }}
                    @else
                   
                    @endisset
                </td>
                <td>
                    @isset($m->v20)
                        {{ $m->v20 }}
                    @else
                    @endisset
                </td>
                <td>
                    @isset($m->v30)
                        {{ $m->v30 }}
                    @else
                    
                    @endisset
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
</body>
</html>