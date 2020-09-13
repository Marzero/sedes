@extends('base.base')

@section('links')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.20/datatables.min.css"/>
<style>
    body{
        font-size: .8em
    }
    table#general{
        font-size: 12px;
    }
    table#general tr th,td{
        text-align: left;
    }
</style>
@endsection

@section('content')

<div class="row">
  <a href="{{ route('indice_pacientes') }}" class="btn btn-warning"> < Volver </a>
  <div class="col-md-12">
    
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <strong class="card-title mb-3"><h4> {{ $paciente->perfil->apellido_paterno }} <br> {{ $paciente->perfil->apellido_materno }} <br> {{ $paciente->perfil->nombres }} </h4></strong>
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
            <table id="general">
                <tr>
                    <td colspan="2">
                        <a href="{{ route('impresion_sus',$paciente->id) }}" target="_blank" class="btn btn-success btn-block">Impresion</a>
                    </td>
                </tr>
                <tr>
                    <th><b>CI</b></th>
                    <td>{{ $paciente->perfil->ci }}</td>
                </tr>
                <tr>
                    <th><b>Fecha de nacimiento</b></th>
                    <td>{{ $paciente->perfil->fecha_nacimiento }}</td>
                </tr>
                <tr>
                    <th><b>Dirección</b></th>
                    <td>{{ $paciente->perfil->direccion }}</td>
                </tr>
                <tr>
                    <th><b>Telefono</b></th>
                    <td>{{ $paciente->perfil->telefono }}</td>
                </tr>
                <tr>
                    <th><b>Sexo</b></th>
                    <td>{{ $paciente->perfil->sexo }}</td>
                </tr>
            </table>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <strong class="card-title mb-3"><b>Atenciones</b></strong>
        </div>
        <div class="card-body">
            <hr>
            @if($paciente->tipo=='asegurado')
                <p class="text-muted m-b-15"></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="A-tab" data-toggle="tab" href="#A" role="tab" aria-controls="A" aria-selected="true" title="A. DATOS ADMINISTRATIVOS"><b>A</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="B-tab" data-toggle="tab" href="#B" role="tab" aria-controls="B" aria-selected="false" title="B. IDENTIFICACION DEL PACIENTE"><b>B</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="C-tab" data-toggle="tab" href="#C" role="tab" aria-controls="C" aria-selected="false" title="C. ANTECEDENTES PEDIATRICOS"><b>C</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="D-tab" data-toggle="tab" href="#D" role="tab" aria-controls="D" aria-selected="false" title="D. VACUNAS"><b>D</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="E-tab" data-toggle="tab" href="#E" role="tab" aria-controls="E" aria-selected="false" title="E. ANTECEDENTES GINECO-OBSTETRICOS"><b>E</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="F-tab" data-toggle="tab" href="#F" role="tab" aria-controls="F" aria-selected="false" title="F. ANTECEDENTES PATOLÓGICOS"><b>F</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="G-tab" data-toggle="tab" href="#G" role="tab" aria-controls="G" aria-selected="false" title="G. MEDICAMENTO EN ENF. CRONICAS"><b>G</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="H-tab" data-toggle="tab" href="#H" role="tab" aria-controls="H" aria-selected="false" title="H. FACTORES DE RIESGO"><b>H</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="I-tab" data-toggle="tab" href="#I" role="tab" aria-controls="I" aria-selected="false" title="I. FACTORES DE RIESGO SOCIAL"><b>I</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="J-tab" data-toggle="tab" href="#J" role="tab" aria-controls="J" aria-selected="false" title="J. OBSERVACIONES"><b>J</b></a>
                    </li>

                </ul>

                <div class="tab-content pl-3 p-1" id="myTabContent">
                    <div class="tab-pane fade active show" id="A" role="tabpanel" aria-labelledby="A-tab">
                        <b>A. DATOS ADMINISTRATIVOS</b>
                        <table class="table">
                            <tr>
                                <td rowspan="8"></td>
                                <th>Apellido paterno</th>
                                <td>{{ $paciente->perfil->apellido_paterno }}</td>
                                <th>CI</th>
                                <td>{{ $paciente->perfil->ci }}</td>
                            </tr>
                            <tr>
                                <th>Apellido materno</th>
                                <td>{{ $paciente->perfil->apellido_materno }}</td>
                                <th>No. H.C.</th>
                                <td>{{ $dato->no_hc }}</td>
                            </tr>
                            <tr>
                                <th>Nombres:</th>
                                <td>{{ $paciente->perfil->nombres }}</td>
                                <th>No. SUMI</th>
                                <td>{{ $dato->no_sumi }}</td>
                            </tr>
                            <tr>
                                <th>Sexo:</th>
                                <td>{{ $paciente->perfil->sexo }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de nacimiento</th>
                                <td>{{ $paciente->perfil->fecha_nacimiento }}</td>
                                
                            </tr>
                            <tr>
                                <th>Ocupación</th>
                                <td>
                                    {{ $paciente->perfil->ocupacion }}
                                </td>
                            </tr>
                            <tr>
                                <th>Direccion:</th>
                                <td>{{ $paciente->perfil->direccion }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="B" role="tabpanel" aria-labelledby="B-tab">
                        <b>B. IDENTIFICACION DEL PACIENTE</b>
                        <table class="table table-condensed table-striped">
                            <tr>
                                <th>Apellido paterno</th>
                                <td>{{ $paciente->perfil->apellido_paterno }}</td>
                                <th>Apellido materno</th>
                                <td>{{ $paciente->perfil->apellido_materno }}</td>
                                <th>Nombres</th>
                                <td>{{ $paciente->perfil->nombres }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de Nacimiento:</th>
                                <td>{{ $paciente->perfil->fecha_nacimiento }}</td>
                                <th>Sexo:</th>
                                <td>{{ $paciente->perfil->sexo }}</td>
                                <th>fecha de ingreso</th>
                                <td>{{ $dato->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Idioma hablado</th>
                                <td>{{ $dato->idioma_hablado }}</td>
                                <th>Idioma materno</th>
                                <td>{{ $dato->idioma_materno }}</td>
                                <th>Auto pertenencia cultural</th>
                                <td>{{ $dato->auto_pertenencia_cultural }}</td>
                            </tr>
                            <tr>
                                <th>Ocupación productiva</th>
                                <td>{{ $dato->ocupacion_productiva }}</td>
                                <th>Ocupacion reproductiva</th>
                                <td>{{ $dato->ocupacion_reproductiva }}</td>
                                <th>Gestion comunitaria</th>
                                <td>{{ $dato->gestion_comunitaria }}</td>
                            </tr>
                            <tr>
                                <th>¿Quien decidio para que acuda al servicio de salud?</th>
                                <td>{{ $dato->quien_decidio }}</td>
                            </tr>
                            <tr>
                                <th>Estado civil</th>
                                <td>{{ $paciente->perfil->estado_civil }}</td>
                                <th>Escolaridad</th>
                                <td>{{ $dato->escolaridad }}</td>
                                <th></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Grupo sanguíneo</th>
                                <td>{{ $dato->grupo_sanguineo }}</td>
                                <th>Factor rh</th>
                                <td>{{ $dato->factor_rh }}</td>
                                <th></th>
                                <td></td>
                            </tr>
                        </table> 
                    </div>
                    <div class="tab-pane fade" id="C" role="tabpanel" aria-labelledby="C-tab">
                        <b>C. ANTECEDENTES PEDIATRICOS</b>
                        {{-- c --}}
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#largeModal">
                            Editar Datos pedriáticos
                        </button>
                        
                        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Nuevo Paciente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('edit_antecedentes_pedriaticos') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="ped_id" value="{{ $ped->id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Peso RN</label>
                                                        <input type="text" name="peso_rn" value="{{ $ped->peso_rn }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tipo de parto</label>
                                                        <input type="text" name="tipo_parto" value="{{ $ped->tipo_parto }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Oservaciones perinatales</label>
                                                        <input type="text" name="obs_perinatales" value="{{ $ped->obs_perinatales }}" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Lactancia</label>
                                                        <input type="text" name="lactancia" value="{{ $ped->lactancia }}" class="form-control" required>
                                                    </div>
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

                        <table class="table table-striped">
                            <tr>
                                <th><b>Peso RN</b></th>
                                <td>{{ $ped->peso_rn }}</td>
                                <th><b>Tipo de parto</b></th>
                                <td>{{ $ped->tipo_parto }}</td>
                            </tr>
                            <tr>
                                <th><b>Obs. perinatales</b></th>
                                <td>{{ $ped->obs_perinatales }}</td>
                                <th><b>Lactancia (exclusiva/periódica)</b></th>
                                <td>{{ $ped->lactancia }}</td>
                            </tr>
                        </table>
                        {{-- end c --}}
                    </div>
                    <div class="tab-pane fade" id="D" role="tabpanel" aria-labelledby="D-tab">
                        <b>D. VACUNAS</b>
                        {{-- D --}}
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#vaunasModal">
                            Editar Datos de vacunas
                        </button>
                        
                        <div class="modal fade" id="vaunasModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Vacunas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('edit_vacunas') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="vacuna_id" value="{{ $vacuna->id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>BCG</label>
                                                        <input type="number" name="bcg" value="{{ $vacuna->bcg }}" min="0" max="5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Polio</label>
                                                        <input type="number" name="polio" value="{{ $vacuna->polio }}" min="0" max="5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>dpt</label>
                                                        <input type="number" name="dpt" value="{{ $vacuna->dpt }}" min="0" max="5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Pentavalente</label>
                                                        <input type="number" name="pentavalente" value="{{ $vacuna->pentavalente }}" min="0" max="5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Sarampión</label>
                                                        <input type="number" name="sarampion" value="{{ $vacuna->sarampion }}" min="0" max="5" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Triple viríca</label>
                                                        <input type="number" name="triple_virica" value="{{ $vacuna->triple_virica }}" min="0" max="5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Fiebre amarilla</label>
                                                        <input type="number" name="fiebre_amarilla" value="{{ $vacuna->fiebre_amarilla }}" min="0" max="5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Hepatitis B</label>
                                                        <input type="number" name="hepatitis_b" value="{{ $vacuna->hepatitis_b }}" min="0" max="5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>DT</label>
                                                        <input type="number" name="dt" value="{{ $vacuna->dt }}" min="0" max="5" class="form-control">
                                                    </div>
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
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>BCG</td>
                                @switch($vacuna->bcg)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                            <tr>
                                <td>Polio</td>
                                @switch($vacuna->polio)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                            <tr>
                                <td>DPT</td>
                                @switch($vacuna->dpt)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                            <tr>
                                <td>Pentavalente</td>
                                @switch($vacuna->pentavalente)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                            <tr>
                                <td>Sarampión</td>
                                @switch($vacuna->sarampion)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                            <tr>
                                <td>Triple virica</td>
                                @switch($vacuna->triple_virica)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                            <tr>
                                <td>Fiebre amarilla</td>
                                @switch($vacuna->fiebre_amarilla)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                            <tr>
                                <td>Hepatitis B</td>
                                @switch($vacuna->hepatitis_b)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                            <tr>
                                <td>D.T.</td>
                                @switch($vacuna->dt)
                                    @case(1)
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(2)
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(3)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        <td></td>
                                        @break
                                    @case(4)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td></td>
                                        @break 
                                    @case(5)
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        @break
                                    @default    
                                @endswitch
                            </tr>
                        </table>
                    {{-- end D --}}
                    </div>
                    <div class="tab-pane fade" id="E" role="tabpanel" aria-labelledby="E-tab">
                        <b>E. ANTECEDENTES GINECO-OBSTETRICOS </b>
                        {{-- E --}}
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#embarazoModal">
                            Editar Datos de embarazos
                        </button>
                        
                        <div class="modal fade" id="embarazoModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Datos de embarazo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('edit_embarazos') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="embarazo_id" value="{{ $embarazo->id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>G</label>
                                                        <input type="number" name="g" value="{{ $embarazo->g }}" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>P</label>
                                                        <input type="number" name="p" value="{{ $embarazo->p }}" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>A</label>
                                                        <input type="number" name="a" value="{{ $embarazo->a }}" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>C</label>
                                                        <input type="number" name="c" value="{{ $embarazo->c }}" min="0" class="form-control">
                                                    </div>
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
                        <hr>
                        <table>
                            <tr>
                                <th><b>Embarazos</b></th>
                                <td><b>G</b>_{{ $embarazo->g }}_</td>
                                <td><b>P</b>_{{ $embarazo->p }}_</td>
                                <td><b>A</b>_{{ $embarazo->a }}_</td>
                                <td><b>C</b>_{{ $embarazo->c }}_</td>
                            </tr>
                        </table>
                        <hr>
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#pregnancyesModal">
                            Agregar datos de embarazos
                        </button>
                        
                        <div class="modal fade" id="pregnancyesModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Agregar datos de partos</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('add_pregnancy') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Año</label>
                                                        <input type="text" name="anio" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Duración (meses)</label>
                                                        <input type="number" name="duracion" value="1" min="1" max="14" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tipo de parto</label>
                                                        <select name="tipo" class="form-control" required>
                                                            <option value="">seleccione una opcion</option>
                                                            <option value="vaginal">Vaginal</option>
                                                            <option value="cesarea">Cesarea</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nro de recien nacidos vivos</label>
                                                        <input type="number" name="vivos" value="0" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nro de recien nacidos muertos</label>
                                                        <input type="number" name="muertos" value="0" min="0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Aborto</label>
                                                        <select name="aborto" class="form-control" required>
                                                            <option value="">seleccione una opcion</option>
                                                            <option value="X">Si</option>
                                                            <option value=" ">No</option>
                                                        </select>
                                                    </div>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th rowspan="2">Año</th>
                                    <th rowspan="2">Duración</th>
                                    <th colspan="2">Tipo de Parto</th>
                                    <th colspan="2">No. de RN(s)</th>
                                    <th rowspan="2">Aborto</th>
                                    <th rowspan="2">Opciones</th>
                                </tr>
                                <tr>
                                    <th>Vaginal</th>
                                    <th>Cesarea</th>
                                    <th>vivo(s)</th>
                                    <th>muerto(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pregnancies as $preg)
                                
                                    <tr>
                                        <td>{{ $preg->anio }}</td>
                                        <td>{{ $preg->duracion }}</td>
                                        @if($preg->tipo=='vaginal')
                                            <td>X</td>
                                            <td></td>
                                        @else
                                            <td></td>
                                            <td>X</td>
                                        @endif
                                        <td>{{ $preg->vivos }}</td>
                                        <td>{{ $preg->muertos }}</td>
                                        <td>{{ $preg->aborto }}</td>
                                        <td>

                                            <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#pregnancyesModal{{ $preg->id }}">
                                                editar
                                            </button>
                                            
                                            <div class="modal fade" id="pregnancyesModal{{ $preg->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="largeModalLabel">Agregar datos de partos</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('edit_pregnancy') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="pregnancy_id" value="{{ $preg->id }}">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Año</label>
                                                                            <input type="text" value="{{ $preg->anio }}" name="anio" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Duración (meses)</label>
                                                                            <input type="number" name="duracion" value="{{ $preg->duracion }}" min="1" max="14" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tipo de parto</label>
                                                                            <select name="tipo" class="form-control" required>
                                                                                <option value="">seleccione una opcion</option>
                                                                                <option value="vaginal" {{ old('tipo',$preg->tipo)=='vaginal' ? 'selected' : '' }}>Vaginal</option>
                                                                                <option value="cesarea" {{ old('tipo',$preg->tipo)=='cesarea' ? 'selected' : '' }}>Cesarea</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Nro de recien nacidos vivos</label>
                                                                            <input type="number" name="vivos" value="{{ $preg->vivos }}" min="0" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Nro de recien nacidos muertos</label>
                                                                            <input type="number" name="muertos" value="{{ $preg->muertos }}" min="0" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Aborto</label>
                                                                            <select name="aborto" class="form-control" required>
                                                                                <option value="">seleccione una opcion</option>
                                                                                <option value="X" {{ old('aborto',$preg->aborto)=='X' ? 'selected' : '' }}>Si</option>
                                                                                <option value=" " {{ old('aborto',$preg->aborto)==null ? 'selected' : '' }}>No</option>
                                                                            </select>
                                                                        </div>
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
                        </table>




                        <hr>



                        <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#pregnancyesModal_paps">
                            Nuevo resultado de PAP
                        </button>

                        <div class="modal fade" id="pregnancyesModal_paps" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Nuevo resultado de PAP</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('add_pap') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                        <div class="modal-body">
                                                
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Fecha</label>
                                                        <input type="date" name="fecha" class="form-control" required>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Resultado</label>
                                                        <select name="resultado" class="form-control" required>
                                                            <option value="">seleccione una opcion</option>
                                                            <option value="positivo">Positivo</option>
                                                            <option value="negativo">Negativo</option>
                                                        </select>
                                                    </div>
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

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center">PAP</th>
                                </tr>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Resultado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paps as $pap)
                                    <tr>
                                        <td>{{ $pap->fecha }}</td>
                                        <td>{{ $pap->resultado }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        {{-- add_anticoncepciones --}}
                        <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#pregnancyesModal_anticoncepciones">
                            Nuevo resultado de Anticoncepcion
                        </button>

                        <div class="modal fade" id="pregnancyesModal_anticoncepciones" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Nuevo registro de metodo anticoncepción</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('add_anticoncepcion') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                        <div class="modal-body">
                                                
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Inicio</label>
                                                        <input type="date" name="inicio" class="form-control" required>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Método</label>
                                                        <input type="text" name="metodo" class="form-control" required>
                                                    </div>
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

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center">Anticoncepción</th>
                                </tr>
                                <tr>
                                    <th>Inicio</th>
                                    <th>Método</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anticoncepciones as $anti)
                                    <tr>
                                        <td>{{ $anti->inicio }}</td>
                                        <td>{{ $anti->metodo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>




                        {{-- end E --}}
                    </div>
                    <div class="tab-pane fade" id="F" role="tabpanel" aria-labelledby="F-tab">
                        <b>F. ANTECEDENTES PATOLÓGICOS</b>
                        {{-- F --}}
                        <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#modal_antecedente_patologico">
                            Nuevo antecedente patológico
                        </button>

                        <div class="modal fade" id="modal_antecedente_patologico" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Nuevo registro de antecedente patológico</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('add_patologico') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Hospitalizaciones por</label>
                                                        <input type="text" name="hospitalizaciones_por" class="form-control" required>
                                                    </div>
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Año</label>
                                                        <input type="number" name="anio" class="form-control" required>
                                                    </div>
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Evolución</label>
                                                        <input type="text" name="evolucion" class="form-control" required>
                                                    </div>
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

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Hospitalizaciones por</th>
                                    <th>Año</th>
                                    <th>Evolución</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patologicos as $pato)
                                    <tr>
                                        <td>{{ $pato->hospitalizaciones_por }}</td>
                                        <td>{{ $pato->anio }}</td>
                                        <td>{{ $pato->evolucion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- end f --}}
                        
                    </div>
                    <div class="tab-pane fade" id="G" role="tabpanel" aria-labelledby="G-tab">
                        <b>G. MEDICAMENTO EN ENF. CRONICAS</b>
                        {{-- G --}}
                        <br>
                        <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#modal_cronica">
                            Nuevo registro de enfermedad cronica
                        </button>

                        <div class="modal fade" id="modal_cronica" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Nuevo registro de enfermedad cronica</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('add_cronica') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Inicio</label>
                                                        <input name="inicio" type="checkbox" class="form-control" value="X">
                                                        {{-- <input type="text" name="inicio" class="form-control" required> --}}
                                                    </div>
                                                </div> 
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Medicamento</label>
                                                        <input type="text" name="medicamento" class="form-control" required>
                                                    </div>
                                                </div> 
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Dosificación</label>
                                                        <input type="text" name="dosificacion" class="form-control" required>
                                                    </div>
                                                </div> 
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Final</label>
                                                        {{-- <input type="text" name="evolucion" class="form-control" required> --}}
                                                        <input name="final" type="checkbox" class="form-control" value="X">
                                                    </div>
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

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Inicio</th>
                                    <th>Medicamento</th>
                                    <th>Dosificación</th>
                                    <th>Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cronicas as $cro)
                                    <tr>
                                        <td>{{ $cro->inicio }}</td>
                                        <td>{{ $cro->medicamento }}</td>
                                        <td>{{ $cro->dosificacion }}</td>
                                        <td>{{ $cro->final }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- END G --}}
                    </div>
                    <div class="tab-pane fade" id="H" role="tabpanel" aria-labelledby="H-tab">
                        <b>H. FACTORES DE RIESGO</b>
                        {{-- h --}}
                        <br>
                        <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#modal_factor_riesgo">
                            Nuevo registro de factor de riesgo
                        </button>

                        <div class="modal fade" id="modal_factor_riesgo" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Nuevo registro de factor de riesgo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('add_riesgo') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Factor de riesgo</label>
                                                        <input type="text" name="factor" class="form-control" required>
                                                    </div>
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Personal</label>
                                                        <input name="personal" type="checkbox" class="form-control" value="X">
                                                    </div>
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Familiar</label>
                                                        {{-- <input type="text" name="evolucion" class="form-control" required> --}}
                                                        <input name="familiar" type="checkbox" class="form-control" value="X">
                                                    </div>
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

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Factor</th>
                                    <th>Personal</th>
                                    <th>Familiar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riesgos as $rie)
                                    <tr>
                                        <td>{{ $rie->factor }}</td>
                                        <td style="text-align: center">{{ $rie->personal }}</td>
                                        <td style="text-align: center">{{ $rie->familiar }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- end h --}}
                    </div>
                    <div class="tab-pane fade" id="I" role="tabpanel" aria-labelledby="I-tab">
                        <b>I. FACTORES DE RIESGO SOCIAL</b>
                        <br>
                        
                        {{-- i --}}
                            @if($social==null)
                            <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#modal_riesgo_social">
                                Nuevo registro de riesgo social
                            </button>
    
                            <div class="modal fade" id="modal_riesgo_social" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="largeModalLabel">Nuevo registro de riesgo social</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('add_social') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Procedencia</label>
                                                            <input type="text" name="procedencia" class="form-control" required>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Viajes a</label>
                                                            <input type="text" name="viajes_a" class="form-control" required>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Otros</label>
                                                            <input type="text" name="otros" class="form-control" required>
                                                        </div>
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
                            @else
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Procedencia</th>
                                            <td>{{ $social->procedencia }}</td>
                                        </tr>
                                        <tr>
                                            <th>Viajes a</th>
                                            <td>{{ $social->viajes_a }}</td>
                                        </tr>
                                        <tr>
                                            <th>Otros</th>
                                            <td>{{ $social->otros }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif

                        {{-- end i --}}
                    </div>
                    <div class="tab-pane fade" id="J" role="tabpanel" aria-labelledby="J-tab">
                        <b>J. OBSERVACIONES</b>
                        <p>{{ $dato->observaciones}}</p>
                    </div>
                </div>
            @else
                    {{-- <a href="{{ route('asegurar_paciente',$paciente->id) }}" class="btn btn-primary">
                        Incluir datos de S.U.S
                    </a> --}}
                    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">
                        Incluir paciente al S.U.S.
                    </button>

                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Registrar datos de identificacion del paciente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <form action="{{ route('asegurar_paciente') }}" method="post" autocomplete="off">
                                    @csrf
                                    <input type="hidden" name="id_paciente" value="{{ $paciente->id }}" id="id_paciente">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>No. HC.</label>
                                                <input type="text" name="no_hc" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>No. SUMI</label>
                                                <input type="text" name="no_sumi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Idioma hablado:</label>
                                                <input type="text" name="idioma_hablado" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Idioma materno:</label>
                                                <input type="text" name="idioma_materno" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Auto pertenencia Cultural:</label>
                                                <input type="text" name="auto_pertenencia_cultural" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ocupación productiva</label>
                                                <input type="text" name="ocupacion_productiva" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ocupacion reproductiva</label>
                                                <input type="text" name="ocupacion_reproductiva" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Gestión comunitaria</label>
                                                <input type="text" name="gestion_comunitaria" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>¿Quién(es) decidieron para que acuda al servicio de salud?</label>
                                                <select name="quien_decidio" class="form-control" required>
                                                    <option value="">Elija una opción</option>
                                                    <option value="Pareja">Pareja</option>
                                                    <option value="Hijo(a)">Hijo(a)</option>
                                                    <option value="Otro familiar">Otro familiar</option>
                                                    <option value="Usted mismo">Usted mismo</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Escolaridad</label>
                                                <select name="escolaridad" class="form-control" required>
                                                    <option value="">Elija una opción</option>
                                                    <option value="Sin instruccion">Sin instruccion</option>
                                                    <option value="Básico">Básico</option>
                                                    <option value="Intermedio">Intermedio</option>
                                                    <option value="Medio o mas">Medio o mas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Grupo sanguíneo</label>
                                                <select name="grupo_sanguineo" class="form-control">
                                                    <option value="">Elija una opción</option>
                                                    <option value="O">O</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Factor rh</label>
                                                <select name="factor_rh" class="form-control" >
                                                    <option value="">Elija una opción</option>
                                                    <option value="+">+</option>
                                                    <option value="-">-</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Otro</label>
                                                <input type="text" name="otro" class="form-control">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Observaciones</label>
                                                <textarea name="observaciones" id="" cols="100" rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">
                                            Confirmar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            @endif
            <hr>
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
                                    <a class="nav-link active show" id="chequeos-tab" data-toggle="tab" href="#chequeos" role="tab" aria-controls="chequeos" aria-selected="true">
                                        Atenciones medicas S.U.S.
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Atenciones médicas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Mordeduras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">
                                        Certificados
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <div class="tab-pane fade active show" id="chequeos" role="tabpanel" aria-labelledby="chequeos-tab">

                                    <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#modal_chequeo">
                                        Nuevo chequeo médico
                                    </button>
            
                                    <div class="modal fade" id="modal_chequeo" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="largeModalLabel">Nuevo registro de factor de riesgo</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('add_chequeo') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                                    <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Fecha</label>
                                                                    <input type="date" name="fecha" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Edad</label>
                                                                    <input type="number" name="edad" min="0" class="form-control" required>
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Talla</label>
                                                                    <input type="text" name="talla" class="form-control" required>
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Peso</label>
                                                                    <input type="text" name="peso" class="form-control" required>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Temp</label>
                                                                    <input type="text" name="temp" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>FC</label>
                                                                    <input type="text" name="fc" class="form-control" required>
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>PA</label>
                                                                    <input type="text" name="pa" class="form-control" required>
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>FR</label>
                                                                    <input type="text" name="fr" class="form-control" required>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Subjetivo</label>
                                                                    <textarea name="subjetivo" id="" cols="30" rows="3" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Objetivo</label>
                                                                    <textarea name="objetivo" id="" cols="30" rows="3" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Análisis</label>
                                                                    <textarea name="analisis" id="" cols="30" rows="3" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Plan de acción</label>
                                                                    <textarea name="plan_de_accion" id="" cols="30" rows="3" class="form-control"></textarea>
                                                                </div>
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




                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Subjetivos</th>
                                                <th>Objetivo</th>
                                                <th>Analisis</th>
                                                <th>Plan de acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($chequeos as $che)
                                                <tr>
                                                    <td>{{ $che->subjetivo }}</td>
                                                    <td>{{ $che->objetivo }}</td>
                                                    <td>{{ $che->analisis }}</td>
                                                    <td>{{ $che->plan_de_accion }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> 
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
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