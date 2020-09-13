@extends('base.base')

@section('links')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.20/datatables.min.css"/> --}}
<link rel="stylesheet" href="{{ URL::to('admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/vendors/themify-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Indice de pacientes</h1>
        </div>
        <div class="card-body">
            
            @include('pages.partes_repitentes.new_paciente_form')
            
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
                    @foreach($pacientes as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->perfil->apellido_paterno}} {{$p->perfil->apellido_materno}} {{$p->perfil->nombres}}</td>
                            <td>{{ $p->perfil->ci }}</td>
                            <td>
                                <a href="{{ route('show_paciente',$p->id) }}" class="btn btn-success btn-sm">
                                    Ver 
                                </a>
                                <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#largeModal-edit">
                                    Actualizar datos
                                </button>
                                <div class="modal fade" id="largeModal-edit" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="largeModalLabel">Actualizar datos de: {{$p->perfil->apellido_paterno}} {{$p->perfil->apellido_materno}} {{$p->perfil->nombres}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('actualizar_paciente') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="paciente_id" value="{{ $p->id }}">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>CI</label>
                                                                <input type="text" name="ci" value="{{ $p->perfil->ci }}" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Nombres</label>
                                                                <input type="text" name="nombres" value="{{ $p->perfil->nombres }}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Apellido Paterno</label>
                                                                <input type="text" name="apellido_paterno" value="{{ $p->perfil->apellido_paterno }}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Apellido Materno</label>
                                                                <input type="text" name="apellido_materno" value="{{ $p->perfil->apellido_materno }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Ocupación</label>
                                                                <input type="text" name="ocupacion"  value="{{ $p->perfil->ocupacion }}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Dirección</label>
                                                                <input type="text" name="direccion" value="{{ $p->perfil->direccion }}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Teléfono</label>
                                                                <input type="text" name="telefono" value="{{ $p->perfil->telefono }}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>fecha de nacimiento</label>
                                                                <input type="date" name="fecha_nacimiento" value="{{ $p->perfil->fecha_nacimiento }}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Sexo</label>
                                                                <select name="sexo" class="form-control" required>
                                                                    <option value="">--Seleccione una opcion--</option>
                                                                    <option value="Masculino" {{ old('sexo',$p->perfil->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                                                    <option value="Femenino" {{ old('sexo',$p->perfil->sexo) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Estado_civil</label>
                                                            <select name="estado_civil" id="estadop_civil_paciente" class="form-control" required>
                                                                <option value="">--Seleccione una opcion--</option>
                                                                <option value="Soltero/a" {{ old('sexo',$p->perfil->estado_civil) == 'Soltero/a' ? 'selected' : '' }}>Soltero/a</option>
                                                                <option value="Casado/a" {{ old('sexo',$p->perfil->estado_civil) == 'Casado/a' ? 'selected' : '' }}>Casado/a</option>
                                                                <option value="Divorciado/a" {{ old('sexo',$p->perfil->estado_civil) == 'Divorciado/a' ? 'selected' : '' }}>Divorciado/a</option>
                                                                <option value="Viudo/a" {{ old('sexo',$p->perfil->estado_civil) == 'Viudo/a' ? 'selected' : '' }}>Viudo/a</option>
                                                            </select>
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
<script>
    $(function(){
        $('.table').DataTable({
            "language": {
            "sProcessing":    "Procesando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "No se encontraron resultados",
            "sEmptyTable":    "Ningún dato disponible en esta tabla",
            "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Buscar:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
        });
    });
</script> 
@endsection