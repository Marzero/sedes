<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuaderno;
use App\Paciente;
use App\Perfil;
use App\Receta;
class CuadernoController extends Controller
{
    public function inicio_cuadernos()
    {
        $cuadernos=Cuaderno::where('user_id',auth()->user()->id)->get();
        $pacientes=Paciente::all();
        return view('pages.medico.cuadernos.inicio_cuadernos',compact('cuadernos','pacientes'));
    }

    public function cuaderno_buscar(Request $request)
    {
        $p=Perfil::where('ci',$request->valor)->first();
        //dd($p);
        echo json_encode($p);
    }

    public function nueva_atencion(Request $request)
    {
            $c=new Cuaderno($request->all());
            $c->user_id=auth()->user()->id;
            $c->fecha=date('Y-m-d');
            //dd($c);
            $c->save();
            flash('Atencion medica guardada correctamente','success');
            return redirect()->route('ver_cuaderno',$c->id);
    }

    public function ver_cuaderno($id)
    {
        $c=Cuaderno::find($id);
        $r=Receta::where('cuaderno_id',$c->id)->first();
        return view('pages.medico.cuadernos.ver_cuaderno',compact('c','r'));
    }
}
