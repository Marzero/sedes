<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    
    <style>
        body{
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
           
            width: 100%;
            font-size: .9em;
        }
        .elemento{
            list-style: none
        }
        .caja_inline {
            display: inline-block;
            
        }
        #cabecera{
            width: 100%;
            height: 110px; 
            margin-top: -20px;
        }
        #info{
            /*border: 1px solid red;*/
        }
        #table{
            width: 100%;
        }
        #table tr th, #table tr td{
            text-align: left;
            /*border: 1px solid #000;*/
            padding: 1px;
            
        }
        #ministerio{
            margin-left: 31%;
            height: 180px;
            /*border: green solid 1px;*/
        }
        #datos{
            width: 100%;
        }
        
        #datos tr th{
            text-align: left;
        }
        #datos tr td{
            text-align: left
        }
        footer {
                position: fixed; 
                bottom: -10px; 
                left: 0px; 
                right: 0px;
                height: 150px; 

                /** Extra personal styles **/
                /*background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;*/
            }
    </style>
    <title>Certificado: </b>{{ $c->id }}</title>
</head>
<body>
    @php
        $usm=App\User::find($c->user_id);
        $medico=App\Perfil::find($usm->perfil_id);
        //dd($medico);
    @endphp
    <img id="ministerio" src="{{ URL::to('ministerio.jpg') }}" alt="">
    <table id="datos">
        <tr>
            <th>Lugar y fecha:</th>
            <td>{{ $c->lugar }} {{ $c->fecha }}</td>
        </tr>
        <tr>
            <th>Nombres y apellidos (del Médico):</th>
            <td>{{ $medico->nombres }} {{ $medico->apellido_paterno }} {{ $medico->apellido_materno }}</td>
        </tr>
        <tr>
            <th>Mátricula profesional Ministerio de salud:</th>
            <td>{{ $c->matricula }}</td>
        </tr>
    </table>
    <hr>
    <div style="font-zise:9px;">
        <p style="text-align: justify; font-size:10px">El médico que suscribe Certifica:</p>
        <p style="text-align: justify; font-size:10px">{!! $c->detalle !!}</p>
    </div>
   
    

    <footer>
        <div style="text-align: right">
            <p>_____________________</p>
            <p>Firma y sello del médico</p>
        </div>
        <hr>
        <p style="text-align: justify; font-size:10px">El presente certificado médico se constituye como único documento válido a nivel nacional, para acreditar el estado de salud de la persona, el cual debe estar impreso y contener la firma y sello del médico que lo suscribe.</p>
    </footer>
</body>
</html>



{{-- "id" => 1
    "user_id" => 1
    "paciente_id" => 1
    "lugar" => "MATOS"
    "fecha" => "2020-08-30"
    "matricula" => "01"
    "detalle" => """
      <p>eSTE CERFICIADO INDICA QUE ASDASDASD<br />
      <strong>ASDASDASD</strong><br />
      &nbsp;</p>
      
      <ul>
      \t<li><strong>ASDASDASDASD</strong></li>
      \t<li><strong>ASDASDASD</strong></li>
      \t<li><strong>ASDASDASDASDA</strong></li>
      </ul>
      
      <p><strong>ASDASASDASD</strong></p>
      
      <p>ASDASDASDASDASD</p>
      
      <p>&nbsp;</p>
      
      <p><em>ASSSDSSSADS</em></p>
      
      <p>&nbsp;</p>
      """
    "created_at" => "2020-08-31 01:16:51"
    "updated_at" => "2020-08-31 01:16:51" --}}