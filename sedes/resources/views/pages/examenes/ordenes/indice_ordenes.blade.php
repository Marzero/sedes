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
<!-- libreria para skin de editor de textarea -->



@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Ordenes de examenes</h1>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">
                Nuevo registro de orden
            </button>
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Registrar nueva orden</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('store_orden') }}" method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" id="user_id">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <b>Fecha: </b> {{ date('Y-m-d') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Paciente</label>
                                        <select name="paciente_id" class="form-control" id="sel2" style="width: 100%" required>
                                            <option value="">--Seleccione una opción--</option>
                                            @foreach($pacientes as $paciente)
                                                <option value="{{ $paciente->id }}">{{ $paciente->perfil->apellido_paterno }} {{ $paciente->perfil->apellido_materno }} {{ $paciente->perfil->nombres }} | {{ $paciente->perfil->ci }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Tipo</label>
                                        <select name="tipo" class="form-control" required>
                                            <option value="">--Seleccione una opcion--</option>
                                            <option value="copro">Examen Coproparasitológico</option>
                                            <option value="especial">Examen Especial</option>
                                            <option value="clinico">Examen de laboratorio clinico</option>
                                            <option value="general">Examen General de orina</option>
                                            <option value="quimica">Examen de quimica sanguinea</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>detalle:</label>
                                        <textarea name="detalle" id="detalle" cols="30" rows="3" class="form-control" required></textarea>
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
            <p class="text-muted m-b-15"></p>
            {{-- <table id="example" class="table table-bordered table-striped table-condensed" style="width:100%"> --}}
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Paciente</th>
                        <th>tipo</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenes as $o)
                        <tr>
                            <td>{{ $o->id}}</td>
                            <td>{{ $o->paciente->perfil->apellido_paterno }} {{ $o->paciente->perfil->apellido_materno }} {{ $o->paciente->perfil->nombres }}</td>
                            <td>{{ $o->tipo }}</td>
                            <td>{{ $o->estado }}</td>
                            <td>
                                <a href="{{ route('show_orden',$o->id) }}" class="btn btn-success">Ver detalles</a>
                                @if($o->estado=='realizado')
                                <a href="{{ route('imprimir_orden',$o->id) }}" target="_blank" class="btn btn-primary">imprimir</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nro.</th>
                        <th>Paciente</th>
                        <th>tipo</th>
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
        CKEDITOR.replace( 'detalle' );
        //var sel2 = document.querySelector(".js-example-basic-single").select2();   
        //sel2
        
    </script> 
    <link href="{{ URL::to('select2/select2.css') }}" rel="stylesheet"/>
    <script src="{{ URL::to('select2/select2.js') }}"></script>
    <script>
        //$(document).ready(function() { $("#e1").select2(); });
        jQuery(function($){ $("#sel2").select2(); });
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
@endsection
