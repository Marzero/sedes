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
            <h1>Examenes generales de orina</h1>
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
                                    $gene=App\General::where('orden_id',$ord->id)->first();    
                                @endphp
                                
                                @if($gene==null)
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
                                                <form action="{{ route('agregar_resultados_generales') }}" method="post" autocomplete="off">
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
                                                                    <li style="list-style: none"><b>Descripción: </b> @php echo $ord->detalle @endphp</li>
                                                                    
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
                                                                <p style="text-align: center">EXAMEN GENERAL DE ORINA</p>
                                                                <table class="table table-condensed table-striped">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="2" style="text-align: center; background-color:#fdff7d;"><b>EXAMEN FÍSICO</b></td>
                                                                            <td colspan="3" style="text-align: center; background-color:#fdff7d;"><b>EXAMEN QUÍMICO</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Volumen</b></td>
                                                                            <td><input type="text" name="volumen" class="form-control"></td>
                                                                            <td><b>Proteinas</b></td>
                                                                            <td><input type="text" name="proteinas" class="form-control"></td>
                                                                            <td>mg/dl</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Densidad</b></td>
                                                                            <td><input type="text" name="densidad" class="form-control"></td>
                                                                            <td><b>Sangre</b></td>
                                                                            <td><input type="text" name="sangre" class="form-control"></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Color</b></td>
                                                                            <td><input type="text" name="color" class="form-control"></td>
                                                                            <td><b>Glucosa</b></td>
                                                                            <td><input type="text" name="glucosa" class="form-control"></td>
                                                                            <td>mg/dl</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Aspecto</b></td>
                                                                            <td><input type="text" name="aspecto" class="form-control"></td>
                                                                            <td><b>Urobilinogeno</b></td>
                                                                            <td><input type="text" name="urobilinogeno" class="form-control"></td>
                                                                            <td>mg/dl</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Olor</b></td>
                                                                            <td><input type="text" name="olor" class="form-control"></td>
                                                                            <td><b>Cetonas</b></td>
                                                                            <td><input type="text" name="cetonas" class="form-control"></td>
                                                                            <td>mg/dl</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Espuma</b></td>
                                                                            <td><input type="text" name="espuma" class="form-control"></td>
                                                                            <td><b>Bilirrubinas</b></td>
                                                                            <td><input type="text" name="bilirrubinas" class="form-control"></td>
                                                                            <td>mg/dl</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>P.H.</b></td>
                                                                            <td><input type="text" name="ph" class="form-control"></td>
                                                                            <td><b>Nitritos</b></td>
                                                                            <td><input type="text" name="nitritos" class="form-control"></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" style="text-align: center; background-color:#fdff7d;"><b>EXAMEN MICROSCOPICO</b></td>
                                                                            <td colspan="3" style="text-align: center; background-color:#fdff7d;"><b>CILINDROS</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Cel. Epiteliales</b></td>
                                                                            <td><input type="text" name="cel_epiteliales" class="form-control"></td>
                                                                            <td><b>Cilindros hialinos</b></td>
                                                                            <td colspan="2"><input type="text" name="cilindros_hialinos" class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Cel. renales</b></td>
                                                                            <td><input type="text" name="cel_renales" class="form-control"></td>
                                                                            <td><b>Cilindros granulosos</b></td>
                                                                            <td colspan="2"><input type="text" name="cilindros_granulosos" class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Cristales</b></td>
                                                                            <td><input type="text" name="cristales" class="form-control"></td>
                                                                            <td><b>Cilindros Mixtos</b></td>
                                                                            <td colspan="2"><input type="text" name="cilindros_mixtos" class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Uratos amorfos</b></td>
                                                                            <td><input type="text" name="uratos" class="form-control"></td>
                                                                            <td><b>Cilindros hematicos</b></td>
                                                                            <td colspan="2"><input type="text" name="cilindros_hematicos" class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Fosfatos amorfos</b></td>
                                                                            <td><input type="text" name="fosfatos" class="form-control"></td>
                                                                            <td><b>Cilindos leucocitarios</b></td>
                                                                            <td colspan="2"><input type="text" name="cilindros_leucocitarios" class="form-control"></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td><b>Leucocitos</b></td>
                                                                            <td><input type="text" name="leucocitos" class="form-control"></td>
                                                                            <td><b></b></td>
                                                                            <td colspan="2"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Piocitos</b></td>
                                                                            <td><input type="text" name="piocitos" class="form-control"></td>
                                                                            <td><b></b></td>
                                                                            <td colspan="2"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Eritrocitos</b></td>
                                                                            <td><input type="text" name="eritrocitos" class="form-control"></td>
                                                                            <td><b></b></td>
                                                                            <td colspan="2"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="5" style="text-align: center; background-color:#fdff7d;"><b>Otros</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="5" style="text-align: center; background-color:#fdff7d;">
                                                                                <textarea name="otros" class="form-control" cols="30" rows="3"></textarea>
                                                                            </td>
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
