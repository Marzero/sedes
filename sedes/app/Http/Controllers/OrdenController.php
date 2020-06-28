<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paciente;
use App\Orden;
use App\Copro;
use App\Especial;
use App\Perfil;
class OrdenController extends Controller
{
    public function indice_ordenes()
    {
        $ordenes=Orden::all();
        return view('pages.ordenes.indice_ordenes',compact('ordenes'));
    }

    public function store_orden(Request $request)
    {
        $o=new Orden($request->all());
        $o->save();
        flash('Orden registrada correctamente','success');
        return redirect()->back();
    }

    public function show_orden($id)
    {
        $o=Orden::find($id);
        return view('pages.ordenes.show_orden',compact('o'));
    }

    public function imprimir_orden($id)
    {
        dd($id);
    }
}
