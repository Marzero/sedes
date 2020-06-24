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
        <a href="{{ route('inicio_cuadernos') }}" class="btn btn-warning"> < Volver </a>
    </div>
</div>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header">
            <div class="page-title">
                
                <h1><b>Identificador de atención: </b>{{ $c->id }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Revision de atencin médica</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Paciente: {{ $c->nombre }}</h1>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <ul>
                    <li style="list-style: none"><b>Fecha: </b>{{ $c->fecha }}</li>
                    <li style="list-style: none"><b>Dato: </b>{{ $c->dato }}</li>
                    <li style="list-style: none"><b>Estado civil: </b>{{ $c->estado_civil }}</li>
                    <li style="list-style: none"><b>Diagnostico: </b>{{ $c->diagnostico }}</li>
                </ul>
                <hr>
                <h1>Receta</h1>
                @isset($r)
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Medicamento</th>
                                <th>Cantidad</th>
                                <th>Indicaciones</th>
                                <th></th>
                            </tr>
                            <tbody>
                                @foreach($r->indicaciones as $i)
                                    <tr>
                                        <td>{{ $i->medicamento }}</td>
                                        <td>{{ $i->cantidad }}</td>
                                        <td>{{ $i->indicaciones }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                        <tbody>
                            <form action="{{ route('agregar_indicacion') }}" method="post">
                                @csrf
                                <input type="hidden" name="receta_id" value="{{ $r->id }}">
                                <tr>
                                    <td class="form_agregar"><input type="text" name="medicamento" class="form-control" placeholder="Medicamento" required></td>
                                    <td class="form_agregar"><input type="text" name="cantidad" class="form-control" placeholder="Cantidad" required></td>
                                    <td class="form_agregar"><input type="text" name="indicaciones" class="form-control" placeholder="Indicaciones" required></td>
                                    <td class="form_agregar"><button type="submit" class="btn btn-success">Agregar</button></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>

                @else
                    <a href="{{ route('crear_receta_cuaderno',$c->id) }}" class="btn btn-cm btn-success">crear receta</a>
                @endif
                <!--botones-->

                <!--fin botones-->

            </div>
        </div>
    </div>
</div>
@endsection