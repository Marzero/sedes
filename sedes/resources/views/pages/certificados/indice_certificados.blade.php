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
<div class="row">
    <div class="col-md-12">
        
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Registros de Certificados Médicos</h1>
        </div>
        <div class="card-body">
            @include('pages.partes_repitentes.new_paciente_form')

            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">
                Nuevo registro de certificado
            </button>






            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Registrar nuevo certificado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('store_certificado') }}" method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" name="id_paciente" value="" id="id_paciente">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label>Pacientes</label>
                                        <select name="paciente_id" class="form-control" id="sel2" style="width: 100%" required>
                                            <option value="">--Seleccione una opcion--</option>
                                            @foreach($pacientes as $p)
                                                <option value="{{ $p->id }}">
                                                    {{ $p->perfil->ci }} | {{ $p->perfil->apellido_paterno }} {{ $p->perfil->apellido_materno }} {{ $p->perfil->nombres }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Matricula profesional</label>
                                        <input type="text" name="matricula" id="matricula" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Lugar</label>
                                        <input type="text" name="lugar" id="lugar" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Fecha</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Detalle:</label>
                                        <textarea name="detalle" id="detalle" cols="50" rows="10" class="form-control"></textarea>
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
                        <th>fecha</th>
                        <th>Lugar</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificados as $c)
                    @php
                    //dd($c);
                        //$paciente=App\Paciente::where('id',$c->paciente_id)->first();
                    @endphp
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>
                                {{ $c->paciente->perfil->apellido_paterno }} 
                                {{ $c->paciente->perfil->apellido_materno }} 
                                {{ $c->paciente->perfil->nombres }}
                            </td>
                            <td>{{ $c->fecha }}</td>
                            <td>{{ $c->lugar }}</td>
                            <td>
                                <a href="{{ route('show_certificado',$c->id) }}" class="btn btn-success">Ver detalles</a>
                                <a href="{{ route('imprimir_certificado',$c->id) }}" class="btn btn-primary">Imprimir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nro.</th>
                        <th>Paciente</th>
                        <th>fecha</th>
                        <th>Lugar</th>
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
