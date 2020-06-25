<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mordedura;
use App\Receta;
use App\Cuaderno;
use App\Paciente;
use App\Perfil;
class MordeduraController extends Controller
{
    public function indice_mordeduras()
    {
        $mordeduras=Mordedura::all();
        return view('pages.mordeduras.indice_mordeduras',compact('mordeduras'));
    }

    public function store_mordedura(Request $request)
    {
        //dd($request);
        $m=new Mordedura($request->all());
        $m->user_id=auth()->user()->id;
        $m->paciente_id=$request->id_paciente;
        $m->municipio=$request->municipio;
        $m->establecimiento=$request->establecimiento;
        $m->nombre=$request->nombre_paciente;
        $m->sexo=$request->sexo_paciente;
        $m->edad=$request->edad_paciente;
        $m->direccion=$request->direc_paciente;
        $m->fecha_mordedura=$request->fecha_mordedura;
        $m->donde=$request->donde;
        $m->localizacion=$request->localizacion_mordedura;
        $m->herida=$request->herida;
        $m->tipo_herida=$request->tipo_herida;
        $m->especie=$request->especie;
        $m->vacunacion_anterior=$request->vacunacion_anterior;
        $m->fecha_vacunacion_anterior=$request->fecha_vacunacion_anterior;
        $m->vacuna_antirrabica=$request->vacuna_antirrabica;
        /*$m->v1=;
        $m->v2=;
        $m->v3=;
        $m->v4=;
        $m->v5=;
        $m->v6=;
        $m->v7=;
        $m->v10=;
        $m->v20=;
        $m->v30=;
        $m->fecha_suero=;
        $m->tipo=;
        $m->nro_lote=;*/
        //dd($m);
        $m->save();
        return redirect()->route('show_mordedura',$m->id);
    }

    public function show_mordedura($id)
    {
        $m=Mordedura::find($id);
        return view('pages.mordeduras.show_mordedura',compact('m'));
    }

    public function store_dosis(Request $request)
    {
        $m=Mordedura::find($request->mordedura_id);
        $m->fill($request->all());
        $m->save();
        flash('Se agrego la dosis correctamente','success');
        return redirect()->back();
    }

}
