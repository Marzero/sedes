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
            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#largeModal">
                Registrar nuevo paciente
            </button>

            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">
                Nueva atención
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
                            <h5 class="modal-title" id="mediumModalLabel">Registrar nueva atención médica</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('nueva_atencion') }}" method="post" autocomplete="off">
                            @csrf
                            <p></p>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <b>Fecha: </b> {{ date('Y-m-d') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CI del paciente</label>
                                        <input type="text" name="ci_paciente" id="ci_paciente" class="form-control" style="background-color: #fdcc44" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Paciente (Apellidos y nombres)</label>
                                        <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nro de ficha</label>
                                        <input type="text" name="nro_ficha" id="nro_ficha" value="" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Edad</label>
                                        <input type="text" name="edad" id="edad" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Diagnóstico</label>
                                        <textarea name="diagnostico" id="diagnostico" cols="30" rows="10" class="form-control" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Receta:</label>
                                        <textarea name="receta" id="receta" cols="30" rows="10" class="form-control" required>
                                            
                                        </textarea>
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
                        <th>Ci</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cuadernos as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->paciente->perfil->apellido_paterno}} {{$c->paciente->perfil->apellido_materno}} {{$c->paciente->perfil->nombres}}</td>
                            <td>{{ $c->paciente->perfil->ci }}</td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nro.</th>
                        <th>Nombre</th>
                        <th>Ci</th>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
              },
              error: function() {
                    console.log("No se ha podido obtener la información");
              }
            });  
        });


    });
</script>
@endsection
