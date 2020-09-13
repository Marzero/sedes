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
        table#contendor{
            width: 100%;

        }
        table#resultados_clinico{
            border-collapse: collapse;
            border: 1px black solid;
        }
        table#resultados_clinico tr td{
            text-align: right;
        }
        table#resultados_clinico tr td, table#resultados_clinico tr th{
            border: 1px black solid;
        }

        table#resultados_gene{
            border-collapse: collapse;
            border: 1px black solid;
        }
        table#resultados_gene tr td{
            text-align: right;
        }
        table#resultados_gene tr td, table#resultados_gene tr th{
            border: 1px black solid;
        }
        
        table#resultados_quim{
            border-collapse: collapse;
            border: 1px black solid;
        }
        table#resultados_quim tr td{
            text-align: right;
        }
        table#resultados_quim tr td, table#resultados_quim tr th{
            border: 1px black solid;
        }
    </style>
    <title>Orden: </b>{{ $o->id }}</title>
</head>
<body>
    @if($o->estado!='pendiente')
        <div>
            <img id="cabecera" src="{{ URL::to('img_report.png') }}">
        </div>
        <div id="info">
            <table id="table">
                {{-- <tr><th><b>Orden:</b></th><td>{{ $o->id }}</td></tr> --}}
                <tr><th><b>Paciente:</b></th><td>{{ $o->paciente->perfil->apellido_paterno }} {{ $o->paciente->perfil->apellido_materno }} {{ $o->paciente->perfil->nombres }}</td></tr>
                <tr><th><b>Fecha de registro de orden:</b></th><td>{{ date('d-m-Y') }}</td></tr>
                {{-- <tr><th><b>Fecha de registro de orden:</b></th><td>{{ $o->created_at->format('d-m-Y') }}</td></tr> --}}
                <tr><th><b>Medico Solicitante:</b></th><td>{{ $o->user->perfil->apellido_paterno }} {{ $o->user->perfil->apellido_materno }} {{ $o->user->perfil->nombres }}</td></tr>
                {{-- <tr><th><b>Tipo de examen:</b></th><td>{{ $o->tipo }}</td></tr> --}}
            </table>
        </div>
        <!--
                <div class="caja_inline" style="width: 40%">
                    
                </div>
                <div class="caja_inline" style="width: 60%">
                    
                </div>
        -->
        <hr>
        @isset($copro)
            <p style="text-align: center"><b><h3>EXAMEN COPROPARASITOLOGICO</h3></b></p>
            <b>Se Observan: </b><br>
            @php echo $copro->detalle  @endphp
        @endisset   

        @isset($espe)
            <h3 style="text-align: center">EXAMENES ESPECIALES</h3>
            <div class="row">
                <div class="col-md-12">
                    <table style="width: 100%">
                        <tbody>
                            <tr>
                                <th>V.I.H.</th>
                                <td>{{ $espe->vih }}</td>
                            </tr>
                            <tr>
                                <th>R.P.R.</th>
                                <td>{{ $espe->rpr }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {!! $espe->serologico !!}
        @endisset

        @isset($clinico)
            <h3 style="text-align: center">LABORATORIO CLINICO</h3>
            <div class="row" style="font-size: .8em;">
                <div class="col-md-12">
                    <table id="resultados_clinico" style="margin: auto">
                        <thead>
                            <tr>
                                <th>ANALISIS</th>
                                <th>RESULTADOS</th>
                                <th colspan="2" style="text-align: right">VALORES DE REF.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" style="background-color: #fff671;text-align: center">
                                    <b>SERIE ROJA</b>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Eritrocitos</b></td>
                                <td>
                                    {{ $clinico->eritrocitos }}
                                </td>
                                <td>mm3</td>
                                <td>4800000 - 6200000 mm3</td>
                            </tr>
                            <tr>
                                <td><b>Hematrocito</b></td>
                                <td>
                                    {{ $clinico->hematrocito }}
                                </td>
                                <td>%</td>
                                <td>48 - 52 %</td>
                            </tr>
                            <tr>
                                <td><b>Hemoglobina</b></td>
                                <td>
                                    {{ $clinico->hemoglobina }}
                                </td>
                                <td>gr %</td>
                                <td>12 -17 gr%</td>
                            </tr>
                            <tr>
                                <td><b>V.C.M.</b></td>
                                <td>
                                    {{ $clinico->vcm }}
                                </td>
                                <td>u3</td>
                                <td>84 - 94 u3</td>
                            </tr>
                            <tr>
                                <td><b>H.C.M</b></td>
                                <td>{{ $clinico->hcm }}</td>
                                <td>ug</td>
                                <td>27 - 31 ug</td>
                            </tr>
                            <tr>
                                <td><b>C.H.C.M.</b></td>
                                <td>
                                    {{ $clinico->chcm }}
                                </td>
                                <td>%</td>
                                <td>32 - 36 %</td>
                            </tr>
                            <tr>
                                <td><b>Sedimentación globular</b></td>
                                <td>
                                    {{ $clinico->sedimentacion_globular }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Primera hora</b></td>
                                <td>
                                    {{ $clinico->primera_hora }}
                                </td>
                                <td></td>
                                <td>3 - 15 cm</td>
                            </tr>
                            <tr>
                                <td><b>Segunda hora</b></td>
                                <td>
                                    {{ $clinico->segunda_hora }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Indice de Kats</b></td>
                                <td>
                                    {{ $clinico->indice_kats }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Grupo sanguineo</b></td>
                                <td>
                                    {{ $clinico->grupo_sanguineo }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Factor RH</b></td>
                                <td>
                                    {{ $clinico->factor_rh }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Plaquetas</b></td>
                                <td>
                                    {{ $clinico->plaquetas }}
                                </td>
                                <td></td>
                                <td>150000 - 350000</td>
                            </tr>
                            <tr>
                                <td><b>Reticulocitos</b></td>
                                <td>
                                    {{ $clinico->reticulocitos }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="background-color: #fff671;text-align: center">
                                    <b>SERIE BLANCA</b>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Leucocitos</b></td>
                                <td>
                                    {{ $clinico->leucocitos }}
                                </td>
                                <td></td>
                                <td>5000-10000 MM3</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="background-color: #fff671;text-align: center">
                                    <b>RECUENTO DIFERENCIAL</b>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Basófilo</b></td>
                                <td>
                                    {{ $clinico->basofilo }}
                                </td>
                                <td></td>
                                <td>0 - 1  %</td>
                            </tr>
                            <tr>
                                <td><b>Eosinófilos</b></td>
                                <td>
                                    {{ $clinico->eosinofilos }}
                                </td>
                                <td></td>
                                <td>1 - 4 %</td>
                            </tr>
                            <tr>
                                <td><b>Mielositos</b></td>
                                <td>
                                    {{ $clinico->mielositos }}
                                </td>
                                <td></td>
                                <td>0%</td>
                            </tr>
                            <tr>
                                <td><b>Metamielositos</b></td>
                                <td>
                                    {{ $clinico->metamielositos }}
                                </td>
                                <td></td>
                                <td>0%</td>
                            </tr>
                            <tr>
                                <td><b>Bastonados</b></td>
                                <td>
                                    {{ $clinico->bastonados }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Segmentados</b></td>
                                <td>
                                    {{ $clinico->segmentados }}
                                </td>
                                <td></td>
                                <td>55 - 65 %</td>
                            </tr>
                            <tr>
                                <td><b>Linfocitos</b></td>
                                <td>
                                    {{ $clinico->linfocitos }}
                                </td>
                                <td></td>
                                <td>25 - 35 %</td>
                            </tr>
                            <tr>
                                <td><b>Monocitos</b></td>
                                <td>
                                    {{ $clinico->monocitos }}
                                </td>
                                <td></td>
                                <td>1 - 8 %</td>
                            </tr>
                            <tr>
                                <td><b>T. de coagulación</b></td>
                                <td>
                                    {{ $clinico->t_de_coagulacion }}
                                </td>
                                <td></td>
                                <td>5 - 10 min</td>
                            </tr>
                            <tr>
                                <td><b>T. desangria</b></td>
                                <td>
                                    {{ $clinico->t_desangria }}
                                </td>
                                <td></td>
                                <td>3 - 5  min</td>
                            </tr>
                            <tr>
                                <td><b>T. de protombina</b></td>
                                <td>
                                    {{ $clinico->t_de_protombina }}
                                </td>
                                <td></td>
                                <td>11 - 12 seg</td>
                            </tr>
                            <tr>
                                <td><b>C. protombina</b></td>
                                <td>
                                    {{ $clinico->c_protombina }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>I.R.N</b></td>
                                <td>
                                    {{ $clinico->irn }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="background-color: #fff671;text-align: center">
                                    <b>EXAMEN DE QUIMICA SANGUINEA</b>
                                </td>
                            </tr>
                            <tr>
                                <td><b>GLUCOSA</b></td>
                                <td>
                                    {{ $clinico->glucosa }}
                                </td>
                                <td></td>
                                <td>70 110 mg/dl</td>
                            </tr>
                            <tr>
                                <td><b>CREATININA</b></td>
                                <td>
                                    {{ $clinico->creatinina }}
                                </td>
                                <td></td>
                                <td>1.5 - 4.0 mg/dl</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>    
        @endisset

        @isset($gene)
            <h3 style="text-align: center">EXAMEN GENERAL DE ORINA</h3>
            <div class="row">
                <div class="col-md-12">
                    <table id="resultados_gene" style="margin: auto">
                        <tbody>
                            <tr>
                                <td colspan="2" style="text-align: center; background-color:#fdff7d;"><b>EXAMEN FÍSICO</b></td>
                                <td colspan="3" style="text-align: center; background-color:#fdff7d;"><b>EXAMEN QUÍMICO</b></td>
                            </tr>
                            <tr>
                                <td><b>Volumen</b></td>
                                <td>
                                    {{ $gene->volumen }}
                                </td>
                                <td><b>Proteinas</b></td>
                                <td>
                                    {{ $gene->proteinas }}
                                </td>
                                <td>mg/dl</td>
                            </tr>
                            <tr>
                                <td><b>Densidad</b></td>
                                <td>
                                    {{ $gene->densidad }}
                                </td>
                                <td><b>Sangre</b></td>
                                <td>
                                    {{ $gene->sangre }}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Color</b></td>
                                <td>
                                    {{ $gene->color }}
                                </td>
                                <td><b>Glucosa</b></td>
                                <td>
                                    {{ $gene->glucosa }}
                                </td>
                                <td>mg/dl</td>
                            </tr>
                            <tr>
                                <td><b>Aspecto</b></td>
                                <td>
                                    {{ $gene->aspecto }}
                                </td>
                                <td><b>Urobilinogeno</b></td>
                                <td>
                                    {{ $gene->urobilinogeno }}
                                </td>
                                <td>mg/dl</td>
                            </tr>
                            <tr>
                                <td><b>Olor</b></td>
                                <td>
                                    {{ $gene->olor }}
                                </td>
                                <td><b>Cetonas</b></td>
                                <td>
                                    {{ $gene->cetonas }}
                                </td>
                                <td>mg/dl</td>
                            </tr>
                            <tr>
                                <td><b>Espuma</b></td>
                                <td>
                                    {{ $gene->espuma }}
                                </td>
                                <td><b>Bilirrubinas</b></td>
                                <td>
                                    {{ $gene->bilirrubinas }}
                                </td>
                                <td>mg/dl</td>
                            </tr>
                            <tr>
                                <td><b>P.H.</b></td>
                                <td>
                                    {{ $gene->ph }}
                                </td>
                                <td><b>Nitritos</b></td>
                                <td>
                                    {{ $gene->nitritos }}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center; background-color:#fdff7d;"><b>EXAMEN MICROSCOPICO</b></td>
                                <td colspan="3" style="text-align: center; background-color:#fdff7d;"><b>CILINDROS</b></td>
                            </tr>
                            <tr>
                                <td><b>Cel. Epiteliales</b></td>
                                <td>
                                    {{ $gene->cel_epiteliales }}
                                    <input type="text" name="" class="form-control">
                                </td>
                                <td><b>Cilindros hialinos</b></td>
                                <td colspan="2">
                                    {{ $gene->cilindros_hialinos }}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Cel. renales</b></td>
                                <td>
                                    {{ $gene->cel_renales }}
                                </td>
                                <td><b>Cilindros granulosos</b></td>
                                <td colspan="2">
                                    {{ $gene->cilindros_granulosos }}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Cristales</b></td>
                                <td>
                                    {{ $gene->cristales }}
                                </td>
                                <td><b>Cilindros Mixtos</b></td>
                                <td colspan="2">
                                    {{ $gene->cilindros_mixtos }}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Uratos amorfos</b></td>
                                <td>
                                    {{ $gene->uratos }}
                                </td>
                                <td><b>Cilindros hematicos</b></td>
                                <td colspan="2">
                                    {{ $gene->cilindros_hematicos }}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Fosfatos amorfos</b></td>
                                <td>
                                    {{ $gene->fosfatos }}
                                </td>
                                <td><b>Cilindos leucocitarios</b></td>
                                <td colspan="2">
                                    {{ $gene->cilindros_leucocitarios }}
                                </td>
                            </tr>
                            
                            <tr>
                                <td><b>Leucocitos</b></td>
                                <td>
                                    {{ $gene->leucocitos }}
                                </td>
                                <td><b></b></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td><b>Piocitos</b></td>
                                <td>
                                    {{ $gene->piocitos }}
                                </td>
                                <td><b></b></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td><b>Eritrocitos</b></td>
                                <td>
                                    {{ $gene->eritrocitos }}
                                    <input type="text" name="" class="form-control">
                                </td>
                                <td><b></b></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: center; background-color:#fdff7d;"><b>Otros</b></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: left">
                                    {{ $gene->otros }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        @endisset

        @isset($quimica)
            <h3 style="text-align: center">EXAMEN GENERAL DE ORINA</h3>
            <div class="row">
                <div class="col-md-12">
                    <table id="resultados_quim" style="margin: auto">
                        <tbody>
                            <tr>
                                <td style="text-align: center; background-color:#fdff7d;"><b></b></td>
                                <td>_________</td>
                                <td style="text-align: center; background-color:#fdff7d;"><b>V. de ref.</b></td>
                            </tr>
                            
                            <tr>
                                <td><b>Glucosa</b></td>
                                <td>
                                    {{ $quimica->glucosa }}
                                </td>
                                <td><b>70-110 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Urea</b></td>
                                <td>
                                    {{ $quimica->urea }}
                                </td>
                                <td><b>20-45 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Creatinina</b></td>
                                <td>
                                    {{ $quimica->creatinina }}
                                </td>
                                <td><b>0.5 - 0.9 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Ácido úrico</b></td>
                                <td>
                                    {{ $quimica->acido_urico }}
                                </td>
                                <td><b>2.5 - 6.0 mg/dl homb. <br> 2.0 - 5.0 mg/dl mujer</b></td>
                            </tr>
                            <tr>
                                <td><b>Trigliceridos</b></td>
                                <td>
                                    {{ $quimica->trigliceridos }}
                                </td>
                                <td><b>Deseable menor 150 mg/dl<br>moder.elev 200-499 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Colesterol</b></td>
                                <td>
                                    {{ $quimica->colesterol }}
                                </td>
                                <td><b>Deseable menor 200 mg/dl<br>Alto mayor 240 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Fosfata alcalina</b></td>
                                <td>
                                    {{ $quimica->fosfatasa_alcalina }}
                                </td>
                                <td><b>Hasta 115 U/I hombe<br>Hasta 105 U/L mujer</b></td>
                            </tr>
                            <tr>
                                <td><b>L.D.L.</b></td>
                                <td>
                                    {{ $quimica->ldl }}
                                </td>
                                <td><b>menor a 129 bajo riesgo<br>mod 140 - 190 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>H.D.L.</b></td>
                                <td>
                                    {{ $quimica->hdl }}
                                </td>
                                <td><b>elev mayor a 190 mg/dl<br>40-60 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Bilirrubinas directa</b></td>
                                <td>
                                    {{ $quimica->bili_directa }}
                                </td>
                                <td><b>Hasta 0.2 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Bilirrubinas indirecta</b></td>
                                <td>
                                    {{ $quimica->bili_indirecta }}
                                </td>
                                <td><b>Hasta 0.8 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Bilirrubina total</b></td>
                                <td>
                                    {{ $quimica->bili_total }}
                                </td>
                                <td><b>Hasta 1.0 mg/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>GPT</b></td>
                                <td>
                                    {{ $quimica->gpt }}
                                </td>
                                <td><b>0-41 U/L</b></td>
                            </tr>
                            <tr>
                                <td><b>G.O.T.</b></td>
                                <td>
                                    {{ $quimica->got }}
                                </td>
                                <td><b>0 - 40 U/L</b></td>
                            </tr>
                            <tr>
                                <td><b>Proteinas</b></td>
                                <td>
                                    {{ $quimica->proteinas }}
                                </td>
                                <td><b>6.0 - 8.0 g/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Globulina</b></td>
                                <td>
                                    {{ $quimica->globulina }}
                                </td>
                                <td><b>2.7 - 3.2 g/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Albumina</b></td>
                                <td>
                                    {{ $quimica->albumina }}
                                </td>
                                <td><b>2.9 - 4.7 g/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>R. A/G</b></td>
                                <td>
                                    {{ $quimica->r }}
                                </td>
                                <td><b>1.2 - 2.2</b></td>
                            </tr>
                            <tr>
                                <td><b>Amilasa</b></td>
                                <td>
                                    {{ $quimica->amilasa }}
                                </td>
                                <td><b>60 - 160 UA/dl</b></td>
                            </tr>
                            <tr>
                                <td><b>Calcio</b></td>
                                <td>
                                    {{ $quimica->calcio }}
                                </td>
                                <td><b>8.5 - 10.5 mg/dl</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        @endisset

        
    @else
        AUN NO SE REGISTRAN LOS RESULTADOS RESULTADOS
    @endif
</body>
</html>