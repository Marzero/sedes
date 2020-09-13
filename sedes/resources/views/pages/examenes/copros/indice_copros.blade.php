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
            <h1>Examenes Coproparasitológicos</h1>
        </div>
        <div class="card-body">

            {{-- 
                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">
                Nuevo registro de examen
            </button>


            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Registrar nueva atención médica</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('nueva_atencion') }}" method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" name="id_paciente" value="" id="id_paciente">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <b>Fecha: </b> {{ date('Y-m-d') }}
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Diagnóstico</label>
                                        <textarea name="diagnostico" id="diagnostico" cols="30" rows="6" class="form-control" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Receta:</label>
                                        <textarea name="receta" id="receta" cols="30" rows="6" class="form-control" required></textarea>
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

                --}}











            
            <h3>Examenes registrados</h3>
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
                                    $co=App\Copro::where('orden_id',$ord->id)->first();    
                                @endphp
                                
                                @if($co==null)
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
                                                <form action="{{ route('agregar_resultados') }}" method="post" autocomplete="off">
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
                                                            
                                                            //dd($fecha_nac,calculaedad($fecha_nac));
                                                        @endphp     
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Edad</label>
                                                                <input type="number" name="edad" value="{{ calculaedad($fecha_nac) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Se observan:</label>
                                                                <textarea name="detalle" id="detalle" cols="30" rows="6" class="editor" required></textarea>
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
            <hr>
            {{-- 
                <h3>
                Ordenes pendientes
            </h3>
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
                                <a href="{{ route('show_copro',$ord->id) }}">Ver detalles</a>
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
                --}}
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
