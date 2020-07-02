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
class ClinicoController extends Controller
{

public function indice_clinicos(Request $request)
    {
        $clinicos=Clinico::all();
        $ordenes=Orden::where('tipo','clinico')->get();
        return view('pages.examenes.clinicos.indice_clinicos',compact('clinicos','ordenes'));
    }

    public function show_clinico($id)
    {
        $clinicos=Clinico::find($id);
        return view('pages.examenes.clinicos.show_clinico',compact('clinicos'));
    }

    public function store_clinico(Request $request)
    {
        $clinicos=new Clinico($request->all());
        $clinicos->user_id=Auth()->user()->id;
        dd($clinicos);
        $clinicos->save();
        flash('Registro correcto de examen especial','success');
        return rediect()->back();
    }
}
