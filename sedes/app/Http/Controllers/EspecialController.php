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
class EspecialController extends Controller
{
    public function indice_especiales(Request $request)
    {
        $especiales=Especial::all();
        $ordenes=Orden::where('tipo','especial')->get();
        return view('pages.examenes.especiales.indice_especiales',compact('especiales','ordenes'));
    }

    public function show_especial($id)
    {
        $especiales=Especial::find($id);
        return view('pages.examenes.especiales.show_especial',compact('especiales'));
    }

    public function store_especial(Request $request)
    {
        $especiales=new Especial($reques->all());
        $especiales->user_id=Auth()->user()->id;
        dd($especiales);
        $especiales->save();
        flash('Registro correcto de examen especial','success');
        return rediect()->back();
    }
}
