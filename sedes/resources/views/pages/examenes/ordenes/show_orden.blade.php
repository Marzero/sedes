@extends('base.base')

@section('styles')
<style>
    .form_agregar{
        background-color: rgb(109, 212, 24);
    }
    table#resultados_clinico tbody tr td{
        border: 1px solid black;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="javascript: history.go(-1)" class="btn btn-warning"> < Volver </a>
        {{-- <a href="{{ route('inicio_cuadernos') }}" class="btn btn-warning"> < Volver </a> --}}
    </div>
</div>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header">
            <div class="page-title">
                
                <h1><b>Identificador de orden: </b>{{ $o->id }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Detalles de examen</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Paciente: {{ $o->paciente->perfil->apellido_paterno }} {{ $o->paciente->perfil->apellido_materno }} {{ $o->paciente->perfil->nombres }}</h1>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <ul>
                    <li style="list-style: none"><b>Fecha de registro de orden: </b>{{ $o->created_at }}</li>
                    <li style="list-style: none"><b>Medico Solicitante: </b>{{ $o->paciente->perfil->apellido_paterno }} {{ $o->paciente->perfil->apellido_materno }} {{ $o->paciente->perfil->nombres }}</li>
                    <li style="list-style: none"><b>Tipo de examen: </b>{{ $o->tipo }}</li>
                </ul>
                <hr>
                <h1>RESULTADOS</h1>
                @if($o->estado!='pendiente')
                    @isset($copro)
                        <h3>EXAMEN COPROPARASITOLOGICO</h3>
                        <b>Se Observan: </b>{{ $copro->detalle }}
                    @else
                        
                    @endisset

                    @isset($espe)
                        <h3>EXAMENES ESPECIALES</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
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
                        <b>Serológico: </b> <br>{{ $espe->serologico }}
                    @else
                        
                    @endisset

                    @isset($clinico)
                        <h3>LABORATORIO CLINICO</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="resultados_clinico">
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
                        <h3>EXAMEN GENERAL DE ORINA</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="resultados_clinico">
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
                                            <td colspan="5">
                                                {{ $gene->otros }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>                    
                    @endisset

                    @isset($quimica)
                        <h3>EXAMEN GENERAL DE ORINA</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="resultados_clinico">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center; background-color:#fdff7d;"><b></b></td>
                                            <td></td>
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
            </div>
        </div>
    </div>
</div>
@endsection
