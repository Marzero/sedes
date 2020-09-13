<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Perfil;
use App\Paciente;
use App\Copro;
use App\Orden;
class CoproController extends Controller
{
    public function indice_copros(Request $request)
    {
        $copros=Copro::all();
        $ordenes=Orden::where('tipo','copro')->get();
        return view('pages.examenes.copros.indice_copros',compact('copros','ordenes'));
    }

    public function show_corpo($id)
    {
        $copro=Copro::find($id);
        return view('pages.examenes.copros.show_copro',compact('copro'));
    }

    public function store_corpo(Request $request)
    {
        $copro=new Copro($reques->all());
        $copro->user_id=Auth()->user()->id;
        dd($copro);
        $copro->save();
        flash('Registro correcto de examen coproparasitológico','success');
        return rediect()->back();
    }
    
}
