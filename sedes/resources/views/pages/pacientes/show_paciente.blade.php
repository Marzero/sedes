@extends('base.base')

@section('links')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.20/datatables.min.css"/>

@endsection

@section('content')

<div class="row">
  <a href="{{ route('indice_pacientes') }}" class="btn btn-warning"> < Volver </a>
  <div class="col-md-12">
    
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <strong class="card-title mb-3"><h4> {{ $paciente->perfil->apellido_paterno }} {{ $paciente->perfil->apellido_materno }} <br> {{ $paciente->perfil->nombres }} </h4></strong>
        </div>
        <div class="card-body">
          <div class="mx-auto d-block">
            <img class="rounded-circle mx-auto d-block" src="{{ URL::to('profile.jpg') }}" alt="Card image cap">
            <h5 class="text-sm-center mt-2 mb-1"></h5>
          <div class="location text-sm-center"></i></div>
          </div>
          <hr>
          <div class="card-text text-sm-center">
            {{-- 
                <a href="#"><i class="fa fa-facebook pr-1"></i></a>
            <a href="#"><i class="fa fa-twitter pr-1"></i></a>
            <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
            <a href="#"><i class="fa fa-pinterest pr-1"></i></a> --}}
            <p><b>CI:</b>{{ $paciente->perfil->ci }}</p>
            <p><b>Fecha de nacimiento:</b>{{ $paciente->perfil->fecha_nacimiento }}</p>
            <p><b>Dirección:</b>{{ $paciente->perfil->direccion }}</p>
            <p><b>Telefono:</b>{{ $paciente->perfil->telefono }}</p>
            <p><b>Sexo:</b>{{ $paciente->perfil->sexo }}</p>
            
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <strong class="card-title mb-3"><h3>Atenciones</h3></strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" >
                    <div class="card"  style="overflow-x: auto ">
                        <div class="card-header">
                            <h4>Atenciones medicas</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted m-b-15"></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Atenciones médicas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Mordeduras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Certificados</a>
                                </li>
                            </ul>

                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3></h3>
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Correl.</th>
                                                <th>Fecha</th>
                                                <th>Diagnostico</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cuadernos as $c)
                                                <tr>
                                                    <td>{{ $c->id}}</td>
                                                    <td>{{ $c->fecha }}</td>
                                                    <td>{{ $c->diagnostico }}</td>
                                                    <td>
                                                        <a href="{{ route('ver_cuaderno',$c->id) }}">Ver detalles</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                 <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Correl.</th>
                                                <th>Fecha</th>
                                                <th>Tipo de herida</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mordeduras as $m)
                                                <tr>
                                                    <td>{{ $m->id}}</td>
                                                    <td>{{ $m->fecha_mordedura }}</td>
                                                    <td>{{ $m->tipo_herida }}</td>
                                                    <td>
                                                        <a href="{{ route('show_mordedura',$m->id) }}">Ver detalles</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Correl.</th>
                                                <th>Fecha</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($certificados as $cert)
                                                <tr>
                                                    <td>{{ $cert->id}}</td>
                                                    <td>{{ $cert->fecha }}</td>
                                                    <td>
                                                        <a href="{{ route('show_certificado',$cert->id) }}">Ver detalles</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @if($paciente->tipo=='asegurado')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>SUS</h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted m-b-15"></p>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Menu 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Menu 2</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content pl-3 p-1" id="myTabContent">
                                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <h3>Datos iniciales</h3>
                                            <p>Some content here.</p>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <h3>Menu 1</h3>
                                            <p>Some content here.</p>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <h3>Menu 2</h3>
                                            <p>Some content here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @else
                    <a href="{{ route('asegurar_paciente',$paciente->id) }}" class="btn btn-primary">
                        Incluir datos de S.U.S
                    </a>
            @endif
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
@endsection