<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paciente;
use App\Orden;
use App\Copro;
use App\Especial;
use App\Perfil;
use App\Gene;
class OrdenController extends Controller
{
    public function indice_ordenes()
    {
        $ordenes=Orden::all();
        $pacientes=Paciente::all();
        return view('pages.examenes.ordenes.indice_ordenes',compact('ordenes','pacientes'));
    }

    public function store_orden(Request $request)
    {
        $o=new Orden($request->all());
        //dd($o);
        $o->estado='pendiente';
        $o->save();
        flash('Orden registrada correctamente','success');
        return redirect()->back();
    }

    public function show_orden($id)
    {
        //dd($id);
        $o=Orden::find($id);
        //dd($o);
        if($o->tipo=='copro'){
            $copro=Copro::where('orden_id',$o->id)->first();
            return view('pages.examenes.ordenes.show_orden',compact('o','copro'));
        }elseif($o->tipo=='especial'){
            $espe=Especial::where('orden_id',$o->id)->first();
            return view('pages.examenes.ordenes.show_orden',compact('o','espe'));
        }
        elseif($o->tipo=='general'){
            $gene=General::where('orden_id',$o->id)->first();
            return view('pages.examenes.ordenes.show_orden',compact('o','gene'));
        }
    }

    public function agregar_resultados(Request $request)
    {
        $orden=Orden::find($request->orden_id);
        $copro=new Copro;
        $copro->orden_id=$request->orden_id;
        $copro->edad=$request->edad;
        $copro->fecha=date('Y-m-d');
        $copro->detalle=$request->detalle;
        $copro->user_id=auth()->user()->id;
        //dd($orden,$copro);
        $copro->save();
        $orden->estado='realizado';
        $orden->save();
        flash('resultados almacenados correctamente','success');
        return redirect()->route('show_orden',$orden->id);
    }

    public function imprimir_orden($id)
    {
        dd($id);
    }
}
