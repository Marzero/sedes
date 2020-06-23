@extends('base.base')

@section('links')

@endsection

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h1>Editar usuario</h1>
        </div>
        <div class="card-body">
            <a href="{{route('indice_usuarios')}}" class="btn btn-warning">
                <--  Volver al indice de usuarios
            </a>
            <hr>
            <form action="{{route('actualizar_usuario')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $u->id }}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>CI</label>
                            <input type="text" name="ci" value="{{ $p->ci }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" name="nombres"  value="{{ $p->nombres }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" value="{{ $p->apellido_paterno }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" name="apellido_materno"  value="{{ $p->apellido_materno }}" class="form-control">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento"  value="{{ $p->fecha_nacimiento }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Ocupación</label>
                            <input type="text" name="ocupacion" value="{{ $p->ocupacion }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="direccion" value="{{ $p->direccion }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" name="telefono" value="{{ $p->telefono }}" class="form-control" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sexo</label>
                            <select name="sexo" class="form-control" required>
                                <option value="">--Seleccione una opcion--</option>
                                <option value="Masculino" {{ old('sexo',$p->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ old('sexo',$p->sexo) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" value="{{ $u->email }}" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary btn-block btn-lg">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection