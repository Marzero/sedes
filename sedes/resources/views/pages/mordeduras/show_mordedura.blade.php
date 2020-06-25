@extends('base.base')

@section('styles')
<style>
    .form_agregar{
        background-color: rgb(109, 212, 24);
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('indice_mordeduras') }}" class="btn btn-warning"> < Volver </a>
    </div>
</div>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header">
            <div class="page-title">
                
                <h1><b>Identificador de mordedura: </b>{{ $m->id }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Ficha de casos de mordedura</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Paciente: {{ $m->nombre }}</h1>
        </div>
        <div class="card-body">
            <ul>
                <div class="col-md-6">
                    <li style="list-style: none"><b>Municipio: </b>{{ $m->municipio }}</li>
                    <li style="list-style: none"><b>Establecimiento: </b>{{ $m->establecimiento }}</li>
                    <li style="list-style: none"><b>Direccion: </b>{{ $m->direccion }}</li>
                    <li style="list-style: none"><b>Sexo: </b>{{ $m->sexo }}</li>
                    <li style="list-style: none"><b>Edad: </b>{{ $m->edad }}</li>
                </div>
                <div class="col-md-6">
                    <li style="list-style: none"><b>Fecha de mordedura: </b>{{ $m->fecha_mordedura }}</li>
                    <li style="list-style: none"><b>Donde fue mordido: </b>{{ $m->donde }}</li>
                    <li style="list-style: none"><b>Localización de la mordedura: </b>{{ $m->localizacion_mordedura }}</li>
                    <li style="list-style: none"><b>Herida: </b>{{ $m->herida }}</li>
                    <li style="list-style: none"><b>Tipo de herida: </b>{{ $m->tipo_herida }}</li>
                </div>
            </ul>
            
            <div class="col-md-12">
                <ul>
                    <hr>
                    <h5>Datos del Animal</h5>
                    <li style="list-style: none"><b>Especie: </b>{{ $m->especie }}</li>
                    <li style="list-style: none"><b>Vacunacion anterior: </b>{{ $m->vacunacion_anterior }}</li>
                    <li style="list-style: none"><b>Fecha: </b>{{ $m->fecha_vacunacion_anterior }}</li>
                    <hr>
                    <h5>Datos del tratamiento del paciente</h5>
                    
                    <li style="list-style: none"><b>Tiene vacunacion antirrábica?: </b>{{ $m->vacuna_antirrabica }}</li>
                </ul>
                <table class="table table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fecha</td>
                            <td>
                                @isset($m->v1)
                                    {{ $m->v1 }}
                                @else
                                    <form action="{{ route('store_dosis') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                        <input type="date" name="v1" class="form-control" required><br>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                @endisset
                            </td>
                            <td>
                                @isset($m->v2)
                                    {{ $m->v2 }}
                                @else
                                    <form action="{{ route('store_dosis') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                        <input type="date" name="v2" class="form-control" required><br>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                @endisset
                            </td>
                            <td>
                                @isset($m->v3)
                                    {{ $m->v3 }}
                                @else
                                    <form action="{{ route('store_dosis') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                        <input type="date" name="v3" class="form-control" required><br>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                @endisset
                            </td>
                            <td>
                                @isset($m->v4)
                                    {{ $m->v4 }}
                                @else
                                    <form action="{{ route('store_dosis') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                        <input type="date" name="v4" class="form-control" required><br>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                @endisset
                            </td>
                            <td>
                                @isset($m->v5)
                                    {{ $m->v5 }}
                                @else
                                    <form action="{{ route('store_dosis') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                        <input type="date" name="v5" class="form-control" required><br>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                @endisset
                            </td>
                            <td>
                                @isset($m->v6)
                                    {{ $m->v6 }}
                                @else
                                    <form action="{{ route('store_dosis') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                        <input type="date" name="v6" class="form-control" required><br>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                @endisset
                            </td>
                            <td>
                                @isset($m->v7)
                                    {{ $m->v7 }}
                                @else
                                    <form action="{{ route('store_dosis') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                        <input type="date" name="v7" class="form-control" required><br>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                @endisset
                            </td>

                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>10 Días</th>
                            <th>20 Días</th>
                            <th>30 Días</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @isset($m->v10)
                                    {{ $m->v10 }}
                                @else
                                <form action="{{ route('store_dosis') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                    <input type="date" name="v10" class="form-control" required><br>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </form>
                                @endisset
                            </td>
                            <td>
                                @isset($m->v20)
                                    {{ $m->v20 }}
                                @else
                                <form action="{{ route('store_dosis') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                    <input type="date" name="v20" class="form-control" required><br>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </form>
                                @endisset
                            </td>
                            <td>
                                @isset($m->v30)
                                    {{ $m->v30 }}
                                @else
                                <form action="{{ route('store_dosis') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="mordedura_id" value="{{ $m->id }}">
                                    <input type="date" name="v30" class="form-control" required><br>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </form>
                                @endisset
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
          
                
                <!--botones-->

                <!--fin botones-->

            </div>
        </div>
    </div>
</div>
@endsection
