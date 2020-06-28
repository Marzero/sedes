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
        {{-- <a href="{{ route('indice_certificados') }}" class="btn btn-warning"> < Volver </a> --}}
    </div>
</div>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header">
            <div class="page-title">
                
                <h1><b>Identificador de certificado: </b>{{ $c->id }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Certificado Medico</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Paciente: {{ $c->paciente->perfil->apellido_paterno }} {{ $c->paciente->perfil->apellido_materno }} {{ $c->paciente->perfil->nombres }}</h1>
        </div>
        <div class="card-body">
            <ul>
                <div class="col-md-6">
                    <li style="list-style: none"><b>Lugar: </b>{{ $c->lugar }}</li>
                    <li style="list-style: none"><b>Fecha: </b>{{ $c->fecha }}</li>
                    <li style="list-style: none"><b>Médico: </b>{{ $c->user->perfil->apellido_paterno }} {{ $c->user->perfil->apellido_materno }} {{ $c->user->perfil->nombres }}</li>
                    <li style="list-style: none"><b>Matrícula: </b>{{ $c->matricula }}</li>
                </div>

            </ul>
            
            <div class="col-md-12">
                <hr>
                {{ $c->detalle }}

            </div>
        </div>
    </div>
</div>
@endsection
