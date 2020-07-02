@extends('base.base')

@section('links')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.20/datatables.min.css"/> --}}
<link rel="stylesheet" href="{{ URL::to('admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/vendors/themify-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/i18n/ar.min.js"></script>
<link rel="stylesheet" href="{{ URL::to('editor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">


@endsection

@section('content')
@php
    function calculaedad($fechanacimiento){
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
        return $ano_diferencia;
    }
@endphp
<div class="row">
    <div class="col-md-12">
        
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Examenes de quimica sanguínea</h1>
        </div>
        <div class="card-body">

            
            <h3></h3>
            {{-- <table id="example" class="table table-bordered table-striped table-condensed" style="width:100%"> --}}
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Paciente</th>
                        <th>Solicitante</th>
                        <th>fecha</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenes as $ord)
                        <tr>
                            <td>{{ $ord->id}}</td>
                            <td>{{ $ord->paciente->perfil->apellido_paterno }} {{ $ord->paciente->perfil->apellido_materno }} {{ $ord->paciente->perfil->nombres }}</td>
                            <td>{{ $ord->user->perfil->apellido_paterno }} {{ $ord->user->perfil->apellido_materno }} {{ $ord->user->perfil->nombres }}</td>
                            <td>{{ $ord->created_at }}</td>
                            <td>{{ $ord->estado }}</td>
                            <td>
                                <a href="{{ route('show_orden',$ord->id) }}">Ver</a>
                                @php
                                    $quimica=App\Quimica::where('orden_id',$ord->id)->first();    
                                @endphp
                                
                                @if($quimica==null)
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#resultadosform">
                                        Agregar resultados
                                    </button>
                                    <div class="modal fade" id="resultadosform" tabindex="-1" role="dialog" aria-labelledby="resultadosformLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="mediumModalLabel">Registrar resultados del analisis</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('agregar_resultados_quimicas') }}" method="post" autocomplete="off">
                                                    @csrf
                                                    <input type="hidden" name="orden_id" value="{{ $ord->id }}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <ul>
                                                                    <li style="list-style: none"><b>Orden nro: </b> {{ $ord->id }}</li>
                                                                    <li style="list-style: none"><b>Usuario que registro la orden: </b> {{ $ord->user->perfil->apellido_paterno }} {{ $ord->user->perfil->apellido_materno }} {{ $ord->user->perfil->nombres }}</li>
                                                                    <li style="list-style: none"><b>Paciente: </b> {{ $ord->paciente->perfil->apellido_paterno }} {{ $ord->paciente->perfil->apellido_materno }} {{ $ord->paciente->perfil->nombres }}</li>
                                                                    <li style="list-style: none"><b>Fecha de nacimiento del paciente: </b> {{ $ord->paciente->perfil->fecha_nacimiento }}</li>
                                                                    <li style="list-style: none"><b>Fecha actual: </b> {{ date('Y-m-d') }}</li>
                                                                    <li style="list-style: none"><b>Fecha de registro de orden: </b> {{ $ord->created_at }}</li>
                                                                    <li style="list-style: none"><b>Descripción: </b> {{ $ord->detalle }}</li>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $fecha_nac=$ord->paciente->perfil->fecha_nacimiento;
                                                        @endphp     
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Edad</label>
                                                                <input type="number" name="edad" value="{{ calculaedad($fecha_nac) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p style="text-align: center">EXAMEN DE QUIMICA SANGUINEA</p>
                                                                <table class="table table-condensed table-striped">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="text-align: center; background-color:#fdff7d;"><b></b></td>
                                                                            <td></td>
                                                                            <td style="text-align: center; background-color:#fdff7d;"><b>V. de ref.</b></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td><b>Glucosa</b></td>
                                                                            <td><input type="text" name="glucosa" class="form-control"></td>
                                                                            <td><b>70-110 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Urea</b></td>
                                                                            <td><input type="text" name="urea" class="form-control"></td>
                                                                            <td><b>20-45 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Creatinina</b></td>
                                                                            <td><input type="text" name="creatinina" class="form-control"></td>
                                                                            <td><b>0.5 - 0.9 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Ácido úrico</b></td>
                                                                            <td><input type="text" name="acido_urico" class="form-control"></td>
                                                                            <td><b>2.5 - 6.0 mg/dl homb. <br> 2.0 - 5.0 mg/dl mujer</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Trigliceridos</b></td>
                                                                            <td><input type="text" name="trigliceridos" class="form-control"></td>
                                                                            <td><b>Deseable menor 150 mg/dl<br>moder.elev 200-499 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Colesterol</b></td>
                                                                            <td><input type="text" name="colesterol" class="form-control"></td>
                                                                            <td><b>Deseable menor 200 mg/dl<br>Alto mayor 240 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Fosfata alcalina</b></td>
                                                                            <td><input type="text" name="fosfatasa_alcalina" class="form-control"></td>
                                                                            <td><b>Hasta 115 U/I hombe<br>Hasta 105 U/L mujer</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>L.D.L.</b></td>
                                                                            <td><input type="text" name="ldl" class="form-control"></td>
                                                                            <td><b>menor a 129 bajo riesgo<br>mod 140 - 190 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>H.D.L.</b></td>
                                                                            <td><input type="text" name="hdl" class="form-control"></td>
                                                                            <td><b>elev mayor a 190 mg/dl<br>40-60 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Bilirrubinas directa</b></td>
                                                                            <td><input type="text" name="bili_directa" class="form-control"></td>
                                                                            <td><b>Hasta 0.2 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Bilirrubinas indirecta</b></td>
                                                                            <td><input type="text" name="bili_indirecta" class="form-control"></td>
                                                                            <td><b>Hasta 0.8 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Bilirrubina total</b></td>
                                                                            <td><input type="text" name="bili_total" class="form-control"></td>
                                                                            <td><b>Hasta 1.0 mg/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>GPT</b></td>
                                                                            <td><input type="text" name="gpt" class="form-control"></td>
                                                                            <td><b>0-41 U/L</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>G.O.T.</b></td>
                                                                            <td><input type="text" name="got" class="form-control"></td>
                                                                            <td><b>0 - 40 U/L</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Proteinas</b></td>
                                                                            <td><input type="text" name="proteinas" class="form-control"></td>
                                                                            <td><b>6.0 - 8.0 g/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Globulina</b></td>
                                                                            <td><input type="text" name="globulina" class="form-control"></td>
                                                                            <td><b>2.7 - 3.2 g/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Albumina</b></td>
                                                                            <td><input type="text" name="albumina" class="form-control"></td>
                                                                            <td><b>2.9 - 4.7 g/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>R. A/G</b></td>
                                                                            <td><input type="text" name="r" class="form-control"></td>
                                                                            <td><b>1.2 - 2.2</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Amilasa</b></td>
                                                                            <td><input type="text" name="amilasa" class="form-control"></td>
                                                                            <td><b>60 - 160 UA/dl</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Calcio</b></td>
                                                                            <td><input type="text" name="calcio" class="form-control"></td>
                                                                            <td><b>8.5 - 10.5 mg/dl</b></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Confirmar
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nro.</th>
                        <th>Paciente</th>
                        <th>Solicitante</th>
                        <th>fecha</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>















@endsection

@section('scripts')
    <script src="{{ URL::to('admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::to('admin/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.20/datatables.min.js"></script>--}}
<script>
    jQuery(function($){
        $('#ci_paciente').on('change',function(e){
            //console.log(e);
            var valor = e.target.value;
            console.log(valor);

            $.ajax({
              url: '{{ URL::to('cuaderno_buscar') }}'+'/'+valor,
              data: valor,
              dataType:"json",
              success: function(respuesta) {
                //console.log(respuesta.latitud,respuesta.longitud);
                $('#nombre_paciente').val(respuesta.apellido_paterno+" "+respuesta.apellido_materno+" "+respuesta.nombres);
                $('#id_paciente').val(respuesta.id);
              },
              error: function() {
                    console.log("No se ha podido obtener la información");
              }
            });  
        });


    });
</script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::to('editor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
  /*jQuery(function ($) {


    $('#diagnostico').wysihtml5({
      toolbar: { fa: true }
    })
  })*/
</script>
</body>
@endsection
