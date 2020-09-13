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
            <h1>Laboratorio Clinico</h1>
        </div>
        <div class="card-body">

            
            <h3>Analisis de laboratorio clínico</h3>
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
                                    $cli=App\Clinico::where('orden_id',$ord->id)->first();    
                                @endphp
                                
                                @if($cli==null)
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
                                                <form action="{{ route('agregar_resultados_clinicos') }}" method="post" autocomplete="off">
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
                                                                <table class="table table-condensed">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Analisis</th>
                                                                            <th>Resultados</th>
                                                                            <th colspan="2">Valores de ref.</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="4" style="background-color: #fff671;">
                                                                                <b>SERIE ROJA</b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Eritrocitos</b></td>
                                                                            <td><input type="text" name="eritrocitos" class="form-control"></td>
                                                                            <td>mm3</td>
                                                                            <td>4800000 - 6200000 mm3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Hematrocito</b></td>
                                                                            <td><input type="text" name="hematrocito" class="form-control"></td>
                                                                            <td>%</td>
                                                                            <td>48 - 52 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Hemoglobina</b></td>
                                                                            <td><input type="text" name="hemoglobina" class="form-control"></td>
                                                                            <td>gr %</td>
                                                                            <td>12 -17 gr%</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>V.C.M.</b></td>
                                                                            <td><input type="text" name="vcm" class="form-control"></td>
                                                                            <td>u3</td>
                                                                            <td>84 - 94 u3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>H.C.M</b></td>
                                                                            <td><input type="text" name="hcm" class="form-control"></td>
                                                                            <td>ug</td>
                                                                            <td>27 - 31 ug</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>C.H.C.M.</b></td>
                                                                            <td><input type="text" name="chcm" class="form-control"></td>
                                                                            <td>%</td>
                                                                            <td>32 - 36 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Sedimentación globular</b></td>
                                                                            <td><input type="text" name="sedimentacion_globular" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Primera hora</b></td>
                                                                            <td><input type="text" name="primera_hora" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>3 - 15 cm</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Segunda hora</b></td>
                                                                            <td><input type="text" name="segunda_hora" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Indice de Kats</b></td>
                                                                            <td><input type="text" name="indice_kats" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Grupo sanguineo</b></td>
                                                                            <td><input type="text" name="grupo_sanguineo" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Factor RH</b></td>
                                                                            <td><input type="text" name="factor_rh" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Plaquetas</b></td>
                                                                            <td><input type="text" name="plaquetas" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>150000 - 350000</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Reticulocitos</b></td>
                                                                            <td><input type="text" name="reticulocitos" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4" style="background-color: #fff671;">
                                                                                <b>SERIE BLANCA</b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Leucocitos</b></td>
                                                                            <td><input type="text" name="leucocitos" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>5000-10000 MM3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4" style="background-color: #fff671;">
                                                                                <b>RECUENTO DIFERENCIAL</b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Basófilo</b></td>
                                                                            <td><input type="text" name="basofilo" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>0 - 1  %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Eosinófilos</b></td>
                                                                            <td><input type="text" name="eosinofilos" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>1 - 4 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Mielositos</b></td>
                                                                            <td><input type="text" name="mielositos" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>0%</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Metamielositos</b></td>
                                                                            <td><input type="text" name="metamielositos" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>0%</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Bastonados</b></td>
                                                                            <td><input type="text" name="bastonados" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Segmentados</b></td>
                                                                            <td><input type="text" name="segmentados" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>55 - 65 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Linfocitos</b></td>
                                                                            <td><input type="text" name="linfocitos" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>25 - 35 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Monocitos</b></td>
                                                                            <td><input type="text" name="monocitos" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>1 - 8 %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>T. de coagulación</b></td>
                                                                            <td><input type="text" name="t_de_coagulacion" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>5 - 10 min</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>T. desangria</b></td>
                                                                            <td><input type="text" name="t_desangria" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>3 - 5  min</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>T. de protombina</b></td>
                                                                            <td><input type="text" name="t_de_protombina" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>11 - 12 seg</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>C. protombina</b></td>
                                                                            <td><input type="text" name="c_protombina" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>I.R.N</b></td>
                                                                            <td><input type="text" name="irn" class="form-control"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4" style="background-color: #fff671;">
                                                                                <b>EXAMEN DE QUIMICA SANGUINEA</b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>GLUCOSA</b></td>
                                                                            <td><input type="text" name="glucosa" class="form-control"></td>
                                                                            <td></td>
                                                                            <td>70 - 110 mg/dl</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>CREATININA</b></td>
                                                                            <td><input type="text" name="creatinina" class="form-control"></td>
                                                                            <td></td>
                                                                            <td><td>1.5 - 4.0 mg/dl</td></td>
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
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        //CKEDITOR.replace( '.serologico' );
        CKEDITOR.replaceClass = 'editor';
    </script> 
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
