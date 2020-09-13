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
            font-size: .6em;       
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
        </style>
</head>
<body>
    <div id="cabecera">
        <div id="izquierda">
            <img src="{{ URL::to('logo_ministerio.jpg') }}" id="logo">
        </div>
        <div id="derecha">
            <p style="font-size: 18px">
                SOLO PARA EL SISTEMA UNICO DE SALUD <br>
                <b>HISTORIAL CLINICO</b>
            </p>
        </div>
    </div>
    <div id="cuerpo">
        <table>
            <thead>
                <tr>
                    <th>A. DATOS ADMINISTRATIVOS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{-- inicio --}}
                        <table class="table">
                            <tr>
                                <td rowspan="8">Sello <br>institucional</td>
                                <th>Apellido paterno</th>
                                <td>{{ $paciente->perfil->apellido_paterno }}</td>
                                <th>CI</th>
                                <td>{{ $paciente->perfil->ci }}</td>
                            </tr>
                            <tr>
                                <th>Apellido materno</th>
                                <td>{{ $paciente->perfil->apellido_materno }}</td>
                                <th>No. H.C.</th>
                                <td>
                                    @php
                                        //dd($paciente->dato);
                                    @endphp
                                    @isset($paciente->dato)
                                    {{ $dato->no_hc }}
                                    @endisset
                                
                                </td>
                            </tr>
                            <tr>
                                <th>Nombres:</th>
                                <td>{{ $paciente->perfil->nombres }}</td>
                                <th>No. SUMI</th>
                                <td>
                                    @isset($paciente->dato)
                                    {{ $dato->no_sumi }}
                                    @endisset
                                    
                                
                                </td>
                            </tr>
                            <tr>
                                <th>Sexo:</th>
                                <td>{{ $paciente->perfil->sexo }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de nacimiento</th>
                                <td>{{ $paciente->perfil->fecha_nacimiento }}</td>
                                
                            </tr>
                            <tr>
                                <th>Ocupación</th>
                                <td>
                                    {{ $paciente->perfil->ocupacion }}
                                </td>
                            </tr>
                            <tr>
                                <th>Direccion:</th>
                                <td>{{ $paciente->perfil->direccion }}</td>
                            </tr>
                        </table>
                        {{-- fin inicio --}}
                    </td>
                </tr>
                <tr>
                    <th>B. IDENTIFICACION DEL PACIENTE/USUARIO</th>
                </tr>
                <tr>
                    
                    @isset($paciente->dato)
                    <table class="table table-condensed table-striped">
                        <tr>
                            <th>Apellido paterno</th>
                            <td>{{ $paciente->perfil->apellido_paterno }}</td>
                            <th>Apellido materno</th>
                            <td>{{ $paciente->perfil->apellido_materno }}</td>
                            <th>Nombres</th>
                            <td>{{ $paciente->perfil->nombres }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento:</th>
                            <td>{{ $paciente->perfil->fecha_nacimiento }}</td>
                            <th>Sexo:</th>
                            <td>{{ $paciente->perfil->sexo }}</td>
                            <th>fecha de ingreso</th>
                            <td>{{ $dato->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Idioma hablado</th>
                            <td>{{ $dato->idioma_hablado }}</td>
                            <th>Idioma materno</th>
                            <td>{{ $dato->idioma_materno }}</td>
                            <th>Auto pertenencia cultural</th>
                            <td>{{ $dato->auto_pertenencia_cultural }}</td>
                        </tr>
                        <tr>
                            <th>Ocupación productiva</th>
                            <td>{{ $dato->ocupacion_productiva }}</td>
                            <th>Ocupacion reproductiva</th>
                            <td>{{ $dato->ocupacion_reproductiva }}</td>
                            <th>Gestion comunitaria</th>
                            <td>{{ $dato->gestion_comunitaria }}</td>
                        </tr>
                        <tr>
                            <th>¿Quien decidio para que acuda al servicio de salud?</th>
                            <td>{{ $dato->quien_decidio }}</td>
                        </tr>
                        <tr>
                            <th>Estado civil</th>
                            <td>{{ $paciente->perfil->estado_civil }}</td>
                            <th>Escolaridad</th>
                            <td>{{ $dato->escolaridad }}</td>
                            <th></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Grupo sanguíneo</th>
                            <td>{{ $dato->grupo_sanguineo }}</td>
                            <th>Factor rh</th>
                            <td>{{ $dato->factor_rh }}</td>
                            <th></th>
                            <td></td>
                        </tr>
                    </table> 
                    @else
                    <table class="table table-condensed table-striped">
                        <tr>
                            <th>Apellido paterno</th>
                            <td>____</td>
                            <th>Apellido materno</th>
                            <td>__</td>
                            <th>Nombres</th>
                            <td>__</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento:</th>
                            <td>______</td>
                            <th>Sexo:</th>
                            <td>_________</td>
                            <th>fecha de ingreso</th>
                            <td>_______</td>
                        </tr>
                        <tr>
                            <th>Idioma hablado</th>
                            <td>______________</td>
                            <th>Idioma materno</th>
                            <td>______________</td>
                            <th>Auto pertenencia cultural</th>
                            <td>____________</td>
                        </tr>
                        <tr>
                            <th>Ocupación productiva</th>
                            <td>___________</td>
                            <th>Ocupacion reproductiva</th>
                            <td>_____________</td>
                            <th>Gestion comunitaria</th>
                            <td>______________</td>
                        </tr>
                        <tr>
                            <th>¿Quien decidio para que acuda al servicio de salud?</th>
                            <td>________________</td>
                        </tr>
                        <tr>
                            <th>Estado civil</th>
                            <td>_________________</td>
                            <th>Escolaridad</th>
                            <td>__________________</td>
                            <th></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Grupo sanguíneo</th>
                            <td>______________</td>
                            <th>Factor rh</th>
                            <td>______________</td>
                            <th></th>
                            <td></td>
                        </tr>
                    </table> 
                    @endisset
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tr>
                <th>C. ANTECEDENTES PEDRIATICOS</th>
                <th>E. ANTECEDENTES GINECO-OBSTETRICOS</th>
            </tr>
            <tr>
                <td>
                    @isset($ped)
                    <table class="table table-striped">
                        <tr>
                            <th><b>Peso RN</b></th>
                            <td>{{ $ped->peso_rn }}</td>
                            <th><b>Tipo de parto</b></th>
                            <td>{{ $ped->tipo_parto }}</td>
                        </tr>
                        <tr>
                            <th><b>Obs. perinatales</b></th>
                            <td>{{ $ped->obs_perinatales }}</td>
                            <th><b>Lactancia (exclusiva/periódica)</b></th>
                            <td>{{ $ped->lactancia }}</td>
                        </tr>
                    </table>
                    @else
                    <table class="table table-striped">
                        <tr>
                            <th><b>Peso RN</b></th>
                            <td>____________</td>
                            <th><b>Tipo de parto</b></th>
                            <td>______</td>
                        </tr>
                        <tr>
                            <th><b>Obs. perinatales</b></th>
                            <td>_____</td>
                            <th><b>Lactancia (exclusiva/periódica)</b></th>
                            <td>__________</td>
                        </tr>
                    </table>
                    @endisset
                </td>
                <td rowspan="2">
                    <table>
                        <tr>
                            <td>
                                @isset($embarazo)
                                <table>
                                    <tr>
                                        <th><b>Embarazos</b></th>
                                        <td><b>G</b>_{{ $embarazo->g }}_</td>
                                        <td><b>P</b>_{{ $embarazo->p }}_</td>
                                        <td><b>A</b>_{{ $embarazo->a }}_</td>
                                        <td><b>C</b>_{{ $embarazo->c }}_</td>
                                    </tr>
                                </table>
                                @else
                                <table>
                                    <tr>
                                        <th><b>Embarazos</b></th>
                                        <td><b>G</b>__</td>
                                        <td><b>P</b>__</td>
                                        <td><b>A</b>__</td>
                                        <td><b>C</b>__</td>
                                    </tr>
                                </table>
                                @endisset
                                <br>
                                @isset($pregnancies)
                                <table>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Año</th>
                                            <th rowspan="2">Duración</th>
                                            <th colspan="2">Tipo de Parto</th>
                                            <th colspan="2">No. de RN(s)</th>
                                            <th rowspan="2">Aborto</th>
                                        </tr>
                                        <tr>
                                            <th>Vaginal</th>
                                            <th>Cesarea</th>
                                            <th>vivo(s)</th>
                                            <th>muerto(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pregnancies as $preg)
                                        
                                            <tr>
                                                <td>{{ $preg->anio }}</td>
                                                <td>{{ $preg->duracion }}</td>
                                                @if($preg->tipo=='vaginal')
                                                    <td>X</td>
                                                    <td></td>
                                                @else
                                                    <td></td>
                                                    <td>X</td>
                                                @endif
                                                <td>{{ $preg->vivos }}</td>
                                                <td>{{ $preg->muertos }}</td>
                                                <td>{{ $preg->aborto }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <table>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Año</th>
                                            <th rowspan="2">Duración</th>
                                            <th colspan="2">Tipo de Parto</th>
                                            <th colspan="2">No. de RN(s)</th>
                                            <th rowspan="2">Aborto</th>
                                        </tr>
                                        <tr>
                                            <th>Vaginal</th>
                                            <th>Cesarea</th>
                                            <th>vivo(s)</th>
                                            <th>muerto(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                    </tbody>
                                </table>
                                @endisset
                            </td>
                            <td>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="text-align: center">PAP</th>
                                        </tr>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Resultado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paps as $pap)
                                            <tr>
                                                <td>{{ $pap->fecha }}</td>
                                                <td>{{ $pap->resultado }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="text-align: center">Anticoncepción</th>
                                        </tr>
                                        <tr>
                                            <th>Inicio</th>
                                            <th>Método</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anticoncepciones as $anti)
                                            <tr>
                                                <td>{{ $anti->inicio }}</td>
                                                <td>{{ $anti->metodo }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    @isset($vacuna)
                    <table>
                        <thead>
                            <tr>
                                <th colspan="6">D. VACUNAS</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>BCG</td>
                            @switch($vacuna->bcg)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                        <tr>
                            <td>Polio</td>
                            @switch($vacuna->polio)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                        <tr>
                            <td>DPT</td>
                            @switch($vacuna->dpt)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                        <tr>
                            <td>Pentavalente</td>
                            @switch($vacuna->pentavalente)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                        <tr>
                            <td>Sarampión</td>
                            @switch($vacuna->sarampion)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                        <tr>
                            <td>Triple virica</td>
                            @switch($vacuna->triple_virica)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                        <tr>
                            <td>Fiebre amarilla</td>
                            @switch($vacuna->fiebre_amarilla)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                        <tr>
                            <td>Hepatitis B</td>
                            @switch($vacuna->hepatitis_b)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                        <tr>
                            <td>D.T.</td>
                            @switch($vacuna->dt)
                                @case(1)
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(2)
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(3)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    <td></td>
                                    @break
                                @case(4)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td></td>
                                    @break 
                                @case(5)
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    @break
                                @default    
                            @endswitch
                        </tr>
                    </table>
                    @endisset
                </td>
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <th>F. ANTECEDENTES PATOLÓGICOS</th>
                        </tr>
                    </table>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hospitalizaciones por</th>
                                <th>Año</th>
                                <th>Evolución</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patologicos as $pato)
                                <tr>
                                    <td>{{ $pato->hospitalizaciones_por }}</td>
                                    <td>{{ $pato->anio }}</td>
                                    <td>{{ $pato->evolucion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <th>G. MEDICAMENTOS ENF. CRONICAS</th>
                        </tr>
                    </table>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Inicio</th>
                                <th>Medicamento</th>
                                <th>Dosificación</th>
                                <th>Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cronicas as $cro)
                                <tr>
                                    <td>{{ $cro->inicio }}</td>
                                    <td>{{ $cro->medicamento }}</td>
                                    <td>{{ $cro->dosificacion }}</td>
                                    <td>{{ $cro->final }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
                <td rowspan="2">
                    <table>
                        <tr>
                            <th>H. FACTORES DE RIESGO</th>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Factor</th>
                                <th>Personal</th>
                                <th>Familiar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($riesgos as $rie)
                                <tr>
                                    <td>{{ $rie->factor }}</td>
                                    <td style="text-align: center">{{ $rie->personal }}</td>
                                    <td style="text-align: center">{{ $rie->familiar }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <th>J. FACTORES DE RIESGO SOCIALES</th>
                        </tr>
                    </table>
                    
                    @if($social==null)
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Procedencia</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Viajes a</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Otros</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Procedencia</th>
                                    <td>{{ $social->procedencia }}</td>
                                </tr>
                                <tr>
                                    <th>Viajes a</th>
                                    <td>{{ $social->viajes_a }}</td>
                                </tr>
                                <tr>
                                    <th>Otros</th>
                                    <td>{{ $social->otros }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </td>
                <td>
                    <table>
                        <tr>
                            <th>J. OBSERVACIONES</th>
                        </tr>
                        <tr>
                            <td>
                                
                                @isset($dato)
                                <p>{{ $dato->observaciones}}</p>
                                @endisset
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div style="page-break-after:always;"></div>
    @php
        $c=0;
    @endphp
    <b>INSTRUCTIVO:</b><br>
    <b>SUBJETIVO:</b>Motivo de consulta y/o sintomas que el paciente refleje durante la anamnesis<br>
    <b>OBJETIVO:</b>Hallazgos del examen físico y/o resultados de laboratorio y complementarios<br>
    <b>ANALISIS:</b>Lista de problemas detectados: diagnósticos, signos o sintómas a seguir, resultados de laboratorio patológico, antecedentes personales<br>
    <b>PLAN DE ACCION:</b>tratamientos, orientaciones, seguimientos, exámenes complementarios necesarios para cada problema.<br>
    
    
        
    @foreach($chequeos as $che)
        @if ($c==4||$c==8||$c==12||$c==16||$c==20||$c==24||$c==28||$c==32||$c==36||$c==40)
        <div style="page-break-after:always;"></div>
        <b>INSTRUCTIVO:</b><br>
        <b>SUBJETIVO:</b>Motivo de consulta y/o sintomas que el paciente refleje durante la anamnesis<br>
        <b>OBJETIVO:</b>Hallazgos del examen físico y/o resultados de laboratorio y complementarios<br>
        <b>ANALISIS:</b>Lista de problemas detectados: diagnósticos, signos o sintómas a seguir, resultados de laboratorio patológico, antecedentes personales<br>
        <b>PLAN DE ACCION:</b>tratamientos, orientaciones, seguimientos, exámenes complementarios necesarios para cada problema.<br>
        
        @else
            
        @endif
        <hr>
        <table>
            <tr>
                <td style="width:10%">
                    <table>
                        <tr>
                            <th>FECHA</th>
                        </tr>
                        <tr>
                            <td>{{ $che->fecha }}</td>
                        </tr>
                        <tr>
                            <th>EDAD</th>
                        </tr>
                        <tr>
                            <td>{{ $che->edad }}</td>
                        </tr>
                        <tr>
                            <th>TALLA</th>
                        </tr>
                        <tr>
                            <td>{{ $che->talla }}</td>
                        </tr>
                        <tr>
                            <th>PESO</th>
                        </tr>
                        <tr>
                            <td>{{ $che->peso }}</td>
                        </tr>
                        <tr>
                            <th>TEMP</th>
                        </tr>
                        <tr>
                            <td>{{ $che->temp }}</td>
                        </tr>
                        <tr>
                            <th>FC</th>
                        </tr>
                        <tr>
                            <td>{{ $che->fc }}</td>
                        </tr>
                        <tr>
                            <th>PA</th>
                        </tr>
                        <tr>
                            <td>{{ $che->pa }}</td>
                        </tr>
                        <tr>
                            <th>FR</th>
                        </tr>
                        <tr>
                            <td>{{ $che->fr }}</td>
                        </tr>
                    </table>
                </td>
                <td style="width:90%; padding-top:0px">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: left" class="espacio_chequeo">
                                <b>Subjetivo:</b> <br> {{ $che->subjetivo }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left" class="espacio_chequeo">
                                <b>Objetivo:</b> <br> {{ $che->objetivo }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left" class="espacio_chequeo">
                                <b>Analisis:</b> <br> {{ $che->analisis }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left" class="espacio_chequeo">
                                <b>Plan de acción:</b> <br> {{ $che->plan_de_accion }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right; height:70px;" class="espacio_chequeo">
                                Nombre y firma
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        @php
            $c++;
        @endphp
    @endforeach
    
</body>
</html>