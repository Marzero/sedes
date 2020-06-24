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
            <h1>Registros de Mordeduras</h1>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#largeModal">
                Registrar nuevo paciente
            </button>

            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">
                Nuevo registro de mordedura
            </button>














            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">Nuevo Paciente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('store_paciente2') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CI</label>
                                            <input type="text" name="ci" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" name="nombres" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" name="apellido_paterno" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" name="apellido_materno" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ocupación</label>
                                            <input type="text" name="ocupacion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input type="text" name="direccion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="text" name="telefono" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select name="sexo" class="form-control" required>
                                                <option value="">--Seleccione una opcion--</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




















            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Registrar nueva mordedura</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('nueva_atencion') }}" method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" name="id_paciente" value="" id="id_paciente">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Municipio</label>
                                        <input type="text" name="municipio" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Establecimiento</label>
                                        <input type="text" name="establecimiento" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>CI del paciente</label>
                                        <input type="text" name="ci_paciente" id="ci_paciente" class="form-control" style="background-color: #fdcc44">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Paciente (Apellidos y nombres)</label>
                                        <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Sexo</label>
                                        <select name="sexo_paciente" id="sexo" class="form-control" required>
                                            <option value="">--Seleccione una opcion--</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Edad</label>
                                        <input type="number" name="edad_paciente" id="edad_paciente" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Dirección</label>
                                        <input type="text" name="direc_paciente" id="direc_paciente" value="" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Fecha de mordedura</label>
                                        <input type="date" name="fecha_mordedura" id="fecha_mordedura" value="" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Donde fue mordido</label>
                                        <input type="text" name="donde" id="donde" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Localización de la mordedura</label>
                                        <input type="text" name="localizacion_mordedura" id="localizacion_mordedura" value="" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Herida</label>
                                        <select name="herida" id="herida" class="form-control" required>
                                            <option value="">--seleccione una opción--</option>
                                            <option value="Úinica">Úinica</option>
                                            <option value="Múltiple">Múltiple</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tipo Herida</label>
                                        <select name="tipo_herida" id="tipo_herida" class="form-control" required>
                                            <option value="">--seleccione una opción--</option>
                                            <option value="Superficial">Superficial</option>
                                            <option value="Profunda">Profunda</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <h5>Datos del animal</h5>
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <label>Especie</label>
                                        <select name="especie" id="especie" class="form-control" required>
                                            <option value="">--seleccione una opción--</option>
                                            <option value="Perro">Perro</option>
                                            <option value="Gato">Gato</option>
                                            <option value="Otras especies">Otras especies</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Vacunacion anterior:</label>
                                        <select name="vacunacion_anterior" id="vacunacion_anterior" class="form-control" required>
                                            <option value="">--seleccione una opción--</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                            <option value="Desconocido">Desconocido</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Fecha de vacunacion anterior():</label>
                                        <input type="date" name="fecha_vacunacion_anterior" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <h5>Datos del tratamiento del paciente</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Tiene la vacuna antirrabica?</label>
                                        <select name="vacuna_antirrabica" id="vacuna_antirrabica" class="form-control" required>
                                            <option value="">--seleccione una opción--</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                            <option value="Desconocido">Desconocido</option>
                                        </select>
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
                        <th>Estado civil</th>
                        <th>Dato</th>
                        <th>Edad</th>
                        <th>Diagnostico</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mordeduras as $m)
                        <tr>
                            <td>{{ $m->id }}</td>
                            <td>{{ $m->nombre }}</td>
                            <td>{{ $m->estado_civil }}</td>
                            <td>{{ $m->dato }}</td>
                            <td>{{ $m->edad }}</td>
                            <td>{{ $m->diagnostico }}</td>
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
