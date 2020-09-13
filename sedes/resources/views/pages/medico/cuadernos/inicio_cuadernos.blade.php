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
            <h1>Atenciones diarias (cuaderno médico)</h1>
        </div>
        <div class="card-body">

            @include('pages.partes_repitentes.new_paciente_form')


            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">
                Nueva atención
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
                                    {{-- <div class="col-md-4">
                                        <label>CI del paciente</label>
                                        <input type="text" name="ci_paciente" id="ci_paciente" class="form-control" style="background-color: #fdcc44" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Paciente (Apellidos y nombres)</label>
                                        <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control" required>
                                    </div> --}}
                                    <div class="col-md-12">
                                    <label>Pacientes</label>
                                        <select name="paciente_id" id="sel2" style="width: 100%" class="form-control" required>
                                            <option value="">--Seleccione una opcion--</option>
                                            @foreach($pacientes as $p)
                                                <option value="{{ $p->id }}">
                                                    {{ $p->perfil->apellido_paterno }} {{ $p->perfil->apellido_materno }} {{ $p->perfil->nombres }} | {{ $p->perfil->ci }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <label>Estado_civil</label>
                                        <select name="estadop_civil_paciente" id="estadop_civil_paciente" class="form-control" required>
                                            <option value="">--Seleccione una opcion--</option>
                                            <option value="Soltero/a">Soltero/a</option>
                                            <option value="Casado/a">Casado/a</option>
                                            <option value="Divorciado/a">Divorciado/a</option>
                                            <option value="Viudo/a">Viudo/a</option>
                                        </select>
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Dato </label><input type="checkbox" name="dato" id="cbox1" value="si" class="form-control"> 
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nro de ficha</label>
                                        <input type="text" name="nro_ficha" id="nro_ficha" value="" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Edad</label>
                                        <input type="text" name="edad" id="edad" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <label>Diagnóstico</label>
                                        <textarea name="diagnostico" id="diagnostico" cols="50" rows="3" class="form-control" required></textarea>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label>Receta:</label>
                                        <textarea name="receta" id="receta" cols="30" rows="6" class="form-control" required></textarea>
                                    </div> --}}
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

            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#modal_impresion_cuaderno">
                Impresion
            </button>
            <div class="modal fade" id="modal_impresion_cuaderno" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Impresion de cuaderno</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('imprimir_cuaderno') }}" method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" id="user_id">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <label>Inicio</label>
                                        <input type="date" class="form-control" name="inicio">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Fin</label>
                                            <input type="date" class="form-control" name="fin">
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
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Dato</th>
                        <th>Edad</th>
                        <th>Diagnostico</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cuadernos as $c)
                    
                        <tr>
                            <td>{{ $c->id}}</td>
                            <td>{{ $c->paciente->perfil->apellido_paterno }} {{ $c->paciente->perfil->apellido_materno }} {{ $c->paciente->perfil->nombres }}</td>
                            <td>{{ $c->fecha }}</td>
                            <td>{{ $c->dato }}</td>
                            <td>{{ $c->edad }}</td>
                            <td>{!! $c->diagnostico !!}</td>
                            <td>
                                <a href="{{ route('ver_cuaderno',$c->id) }}">Ver detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nro.</th>
                        <th>Nombre</th>
                        <th>Estado civil</th>
                        <th>Dato</th>
                        <th>Edad</th>
                        <th>Diagnostico</th>
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
        CKEDITOR.replace( 'diagnostico' );
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
