@extends('base.base')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bienvenido {{ Auth()->user()->email }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Pagina inicial</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Acceso correcto!</span> Bienvenido al sistema de Control.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>



    <div class="col-lg-3 col-md-6">
        <div class="social-box facebook">
            <i class="fa fa-users"></i>
            <ul>
                <li>
                    <span class="count">Pacientes</span> 
                    <span></span>
                </li>
                <li>
                    <span class="count">{{ count(App\Paciente::all()) }}</span>
                    <span></span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box twitter">
            <i class="fa fa-list"></i>
            <ul>
                <li>
                    <span class="count">Mordeduras</span>
                    <span></span>
                </li>
                <li>
                    <span class="count">{{ count(App\Mordedura::all()) }}</span>
                    <span></span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box linkedin">
            <i class="fa fa-list"></i>
            <ul>
                <li>
                    <span class="count">Registros</span> 
                    <span>Médicos</span>
                </li>
                <li>
                    <span class="count">{{ count(App\Cuaderno::all()) }}</span>
                    <span></span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box google-plus">
            <i class="fa fa-list"></i>
            <ul>
                <li>
                    <span class="count">Certificados</span>
                    <span>Médicos</span>
                </li>
                <li>
                    <span class="count">{{ count(App\Certificado::all()) }}</span>
                    <span></span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <!--/.col-->

@endsection
