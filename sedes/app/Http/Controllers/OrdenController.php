<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paciente;
use App\Orden;
use App\Copro;
use App\Especial;
use App\Perfil;
use App\General;
use App\Clinico;
use App\Quimica;
class OrdenController extends Controller
{
    public function indice_ordenes()
    {
        $ordenes=Orden::where('user_id',auth()->user()->id)->get();
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
        elseif($o->tipo=='clinico'){
            $clinico=Clinico::where('orden_id',$o->id)->first();
            return view('pages.examenes.ordenes.show_orden',compact('o','clinico'));
        }
        elseif($o->tipo=='general'){
            $gene=General::where('orden_id',$o->id)->first();
            return view('pages.examenes.ordenes.show_orden',compact('o','gene'));
        }
        elseif($o->tipo=='quimica'){
            $quimica=Quimica::where('orden_id',$o->id)->first();
            return view('pages.examenes.ordenes.show_orden',compact('o','quimica'));
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

    public function agregar_resultados_especiales(Request $request)
    {
        $orden=Orden::find($request->orden_id);
        $especial=new Especial($request->all());
        $especial->orden_id=$request->orden_id;
        $especial->edad=$request->edad;
        $especial->fecha=date('Y-m-d');
        $especial->user_id=auth()->user()->id;
        //dd($orden,$especial);
        $especial->save();
        $orden->estado='realizado';
        $orden->save();
        flash('resultados almacenados correctamente','success');
        return redirect()->route('show_orden',$orden->id);
    }

    public function agregar_resultados_clinicos(Request $request)
    {
        $orden=Orden::find($request->orden_id);
        $clinico=new Clinico($request->all());
        $clinico->orden_id=$request->orden_id;
        $clinico->edad=$request->edad;
        $clinico->fecha=date('Y-m-d');
        $clinico->user_id=auth()->user()->id;
        //dd($orden,$clinico);
        $clinico->save();
        $orden->estado='realizado';
        $orden->save();
        flash('resultados almacenados correctamente','success');
        return redirect()->route('show_orden',$orden->id);
    }

    public function agregar_resultados_generales(Request $request)
    {
        $orden=Orden::find($request->orden_id);
        $gene=new General($request->all());
        $gene->orden_id=$request->orden_id;
        $gene->edad=$request->edad;
        $gene->fecha=date('Y-m-d');
        $gene->user_id=auth()->user()->id;
        //dd($orden,$gene);
        $gene->save();
        $orden->estado='realizado';
        $orden->save();
        flash('resultados almacenados correctamente','success');
        return redirect()->back();
        return redirect()->route('show_orden',$orden->id);
    }
    public function agregar_resultados_quimicas(Request $request)
    {
        $orden=Orden::find($request->orden_id);
        $quimica=new Quimica($request->all());
        $quimica->orden_id=$request->orden_id;
        $quimica->edad=$request->edad;
        $quimica->fecha=date('Y-m-d');
        $quimica->user_id=auth()->user()->id;
        //dd($orden,$quimica);
        $quimica->save();
        $orden->estado='realizado';
        $orden->save();
        flash('resultados almacenados correctamente','success');
        return redirect()->back();
        return redirect()->route('show_orden',$orden->id);
    }

    public function imprimir_orden($id)
    {
        $o=Orden::find($id);
        //dd($o);
        if($o->tipo=='copro'){
            $copro=Copro::where('orden_id',$o->id)->first();
            $view = view('pages.examenes.ordenes.imprimir_orden',compact('o','copro'));
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper("letter", "Portrait");
            $pdf->loadHTML($view);
            return $pdf->stream('o','copro');
            //return view('pages.examenes.ordenes.imprimir_orden',compact('o','copro'));
        }elseif($o->tipo=='especial'){
            $espe=Especial::where('orden_id',$o->id)->first();
            $view = view('pages.examenes.ordenes.imprimir_orden',compact('o','espe'));
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper("letter", "Portrait");
            $pdf->loadHTML($view);
            return $pdf->stream('o','espe');
        }
        elseif($o->tipo=='clinico'){
            $clinico=Clinico::where('orden_id',$o->id)->first();
            $view = view('pages.examenes.ordenes.imprimir_orden',compact('o','clinico'));
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper("letter", "Portrait");
            $pdf->loadHTML($view);
            return $pdf->stream('o','clinico');
        }
        elseif($o->tipo=='general'){
            $gene=General::where('orden_id',$o->id)->first();
            $view = view('pages.examenes.ordenes.imprimir_orden',compact('o','gene'));
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper("letter", "Portrait");
            $pdf->loadHTML($view);
            return $pdf->stream('o','gene');
        }
        elseif($o->tipo=='quimica'){
            $quimica=Quimica::where('orden_id',$o->id)->first();
            $view = view('pages.examenes.ordenes.imprimir_orden',compact('o','quimica'));
            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper("letter", "Portrait");
            $pdf->loadHTML($view);
            return $pdf->stream('o','quimica');
        }
    }
}
