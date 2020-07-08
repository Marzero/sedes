<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enfermeria;
use App\User;
use App\Paciente;
use App\Perfil;
class EnfermeriaController extends Controller
{
    public function indice_enfermerias()
    {
        $enfermerias=Enfermeria::all();
        $pacientes=Paciente::all();
        $medicos=User::where('tipo','medico')->get();
        return view('pages.enfermerias.indice_enfermerias',compact('enfermerias','pacientes','medicos'));
    }

    public function store_enfermeria(Request $request)
    {
        $e=new Enfermeria($request->all());
        //dd($e);
        $e->fecha=date('Y-m-d');
        $e->ficha=' ';
        $e->user_id=auth()->user()->id;
        $e->save();
        flash('Registro creado correctamente','success');
        return redirect()->back();
    }

    public function show_enfermeria($id)
    {
        $enfer=Enfermeria::find($id);
        return view('pages.enfermerias.show_enfermeria',compact('enfer'));
    }
}
