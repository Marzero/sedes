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
        $pacientes=Paciente::all();
        $mordeduras=Mordedura::all();
        return view('pages.mordeduras.indice_mordeduras',compact('mordeduras','pacientes'));
    }

    public function store_mordedura(Request $request)
    {
        //dd($request);
        $paciente=Paciente::find($request->paciente_id);
        $perfil=Perfil::find($paciente->perfil_id);
        $m=new Mordedura($request->all());
        
        $m->user_id=auth()->user()->id;

        $m->paciente_id=$request->paciente_id;
        $m->municipio=$request->municipio;
        $m->establecimiento=$request->establecimiento;

        $m->nombre=$perfil->apellido_paterno.' '.$perfil->apellido_materno.' '.$perfil->nombres;
        $m->sexo=$perfil->sexo;
        $m->direccion=$perfil->direccion;

        $m->edad=$request->edad_paciente;
        $m->fecha_mordedura=$request->fecha_mordedura;
        $m->donde=$request->donde;
        $m->localizacion=$request->localizacion_mordedura;
        $m->herida=$request->herida;
        $m->tipo_herida=$request->tipo_herida;
        $m->especie=$request->especie;
        $m->vacunacion_anterior=$request->vacunacion_anterior;
        $m->fecha_vacunacion_anterior=$request->fecha_vacunacion_anterior;
        $m->vacuna_antirrabica=$request->vacuna_antirrabica;
        //dd($m);
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

    public function impresion_mordedura($id)
    {
        $m=Mordedura::find($id);
        $view = view('pages.mordeduras.impresion_mordedura',compact('m'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("letter", "Portrait");
        $pdf->loadHTML($view);
        return $pdf->stream('m');
    }

}
