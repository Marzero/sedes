@extends('base.base')

@section('links')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.20/datatables.min.css"/>

@endsection

@section('content')

<div class="row">
  <a href="{{ route('indice_usuarios') }}" class="btn btn-warning"> < Volver </a>
  <div class="col-md-12">
    
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <strong class="card-title mb-3"><h1> Usuario - {{ $u->id }}  </h1></strong>
        </div>
        <div class="card-body">
          <div class="mx-auto d-block">
            <img class="rounded-circle mx-auto d-block" src="{{ URL::to('profile.jpg') }}" alt="Card image cap">
            <h5 class="text-sm-center mt-2 mb-1">{{$u->email}}</h5>
          <div class="location text-sm-center"></i>{{$u->perfil->apellido_paterno}} {{$u->perfil->apellido_materno}}</div>
          </div>
          <hr>
          <div class="card-text text-sm-center">
            <a href="#"><i class="fa fa-facebook pr-1"></i></a>
            <a href="#"><i class="fa fa-twitter pr-1"></i></a>
            <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
            <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <strong class="card-title mb-3"><h1> Usuario - {{ $u->id }}  </h1></strong>
        </div>
        <div class="card-body">
          <h2>Permisos</h2>
          <table id="example" class="table table-bordered table-striped table-condensed" style="width:100%">
              <thead>
                  <tr>
                      <th>Id de permiso</th>
                      <th>Nombre</th>
                      <th>Opciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($permisos as $p)
                    <tr>
                      <td>{{ $p->id }}</td>
                      <td>{{ $p->name }}</td>
                      <td>
                        <form method="POST" action="{{ route('asignaciones.asignar') }}">
                          {{ csrf_field() }}
                          <input type="hidden" name="user" value="{{ $u->id }}">
                          <input type="hidden" name="permiso" value="{{ $p->id }}">
                          <input class="per" type="checkbox" name="{{ $p->id }}" id="permiso_{{ $p->id }}" onclick="register(this)" {{ $u->hasPermissionTo($p) ? 'checked' : '' }}>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
          <hr>
          <h2>Asignacion de rol</h2>
          <form action="{{ route('asignar_rol') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $u->id }}">
              @if($u->hasRole('Administrador'))
                <input type="hidden" name="rol_anterior" value="Administrador">
              @elseif($u->hasRole('Doctor'))
                <input type="hidden" name="rol_anterior" value="Doctor">
              @elseif($u->hasRole('Laboratorista'))
                <input type="hidden" name="rol_anterior" value="Laboratorista">
              @elseif($u->hasRole('Enfermeria'))
                <input type="hidden" name="rol_anterior" value="Enfermeria">
              @else
              @endif
            
            <div class="row">
              <div class="col-md-12">
                <label>Rol</label>
                <select name="role" id="" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @if($u->hasRole('Administrador'))
                    <option value="Administrador" selected>Administrador</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Laboratorista">Laboratorista</option>
                    <option value="Enfermeria">Enfermeria</option>
                  @elseif($u->hasRole('Doctor'))
                    <option value="Administrador">Administrador</option>
                    <option value="Doctor" selected>Doctor</option>
                    <option value="Laboratorista">Laboratorista</option>
                    <option value="Enfermeria">Enfermeria</option>
                  @elseif($u->hasRole('Laboratorista'))
                    <option value="Administrador">Administrador</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Laboratorista" selected>Laboratorista</option>
                    <option value="Enfermeria">Enfermeria</option>
                  @elseif($u->hasRole('Enfermeria'))
                    <option value="Administrador">Administrador</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Laboratorista">Laboratorista</option>
                    <option value="Enfermeria" selected>Enfermeria</option>
                  @else
                  @endif
                  {{-- @foreach ($roles as $rol)
                      <option value="{{ $rol->id }}" {{ old('role_id',$u->hasRole('Administrador'))==TRUE ? 'selected' : '' }}>{{ $rol->name }}</option>
                  @endforeach --}}
                </select>

              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-block">enviar</button>
              </div>
            </div>
          </form>
            {{-- 
            Doctor
            Laboratorista
            Enfermeria --}}

        </div>
      </div>

  </div>



  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.20/datatables.min.js"></script>
<script>
    $(function(){
        $('#example').DataTable({
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
<script>
    function register(elemento){
      const us={!! json_encode($u) !!};
      var configuracion = { 
          usuario: us.id,
          permiso: elemento.name
      };
      //var datos = configuracion.serialize();
      //console.log(configuracion);
      $.ajax({
        url: '{{ URL::to('asignar_permiso') }}'+'/'+configuracion,
        data: configuracion,
        dataType:"json",
        success: function(respuesta) {
          //console.log(respuesta);
          var resp=respuesta;
          console.log(resp)
          var spaner=$("#texto_"+elemento.name).text();
          //var spaner=getElementById("#texto_"+elemento.name);
          {{-- if(resp='permiso otorgado'){
                            //$("#texto_"+elemento.name).text()="Activo";
                            alert('Activo');
                          }else{
                            //$("#texto_"+elemento.name).text()="Inactivo";
                            alert('Inactivo');
                          } --}}
        },
        error: function() {
              console.log("No se ha podido obtener la información");
          }
      });
    }
  </script>
@endsection