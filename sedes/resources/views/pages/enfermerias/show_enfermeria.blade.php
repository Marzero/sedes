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
                
                <h1><b>Registro de atencion en enfermeria: </b>{{ $enfe->id }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Detalles de atención</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Paciente: {{ $enfe->paciente->perfil->apellido_paterno }} {{ $enfe->paciente->perfil->apellido_materno }} {{ $enfe->paciente->perfil->nombres }}</h1>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <ul>
                    <li style="list-style: none"><b>Fecha: </b>{{ $enfe->created_at }}</li>
                    <li style="list-style: none"><b></li>
                    <li style="list-style: none"><b> </b></li>
                </ul>
                <hr>
                <h1>Receta</h1>

                <!--botones-->

                <!--fin botones-->

            </div>
        </div>
    </div>
</div>
@endsection
