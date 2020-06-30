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
                    <li style="list-style: none"><b>Diagnostico: </b></li>
                </ul>
                <hr>
                <h1>RESULTADOS</h1>
                @if($o->tipo=='copro')
                    @php
                        $copro=App\Copro::where('orden_id',$o->id)->first();
                    @endphp
                    <h3>EXAMEN COPROPARASITOLOGICO</h3>
                    <p><b>Se Observan: </b>{{ $copro->detalle }}</p>
                @else 

                @endif
            </div>
        </div>
    </div>
</div>
@endsection
