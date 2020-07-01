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
        <a href="javascript: history.go(-1)" class="btn btn-warning"> < Volver </a>
        {{-- <a href="{{ route('inicio_cuadernos') }}" class="btn btn-warning"> < Volver </a> --}}
    </div>
</div>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header">
            <div class="page-title">
                
                <h1><b>Identificador de orden: </b>{{ $o->id }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Detalles de examen</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Paciente: {{ $o->paciente->perfil->apellido_paterno }} {{ $o->paciente->perfil->apellido_materno }} {{ $o->paciente->perfil->nombres }}</h1>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <ul>
                    <li style="list-style: none"><b>Fecha de registro de orden: </b>{{ $o->created_at }}</li>
                    <li style="list-style: none"><b>Medico Solicitante: </b>{{ $o->paciente->perfil->apellido_paterno }} {{ $o->paciente->perfil->apellido_materno }} {{ $o->paciente->perfil->nombres }}</li>
                    <li style="list-style: none"><b>Tipo de examen: </b>{{ $o->tipo }}</li>
                </ul>
                <hr>
                <h1>RESULTADOS</h1>
                @isset($copro)
                    <h3>EXAMEN COPROPARASITOLOGICO</h3>
                    <b>Se Observan: </b>{{ $copro->detalle }}
                @endisset

                @isset($espe)
                    <h3>EXAMENES ESPECIALES</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>V.I.H.</th>
                                        <td>R.P.R.</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <b>Se Observan: </b>{{ $copro->detalle }}
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
