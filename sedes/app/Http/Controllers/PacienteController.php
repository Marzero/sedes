<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paciente;
use App\Perfil;
use App\Dato;
use App\Cuaderno;
use App\Orden;
use App\Mordedura;
use App\Certificado;
class PacienteController extends Controller
{
    public function indice_pacientes()
    {
        $pacientes=Paciente::all();
        return view('pages.pacientes.indice_pacientes',compact('pacientes'));
    }

    public function store_paciente(Request $request)
    {   
        $perfil=new Perfil($request->all());
        $perfil->save();
        //dd($perfil);
        $paciente=new Paciente;
        $paciente->perfil_id=$perfil->id;
        $paciente->tipo='no asegurado';
        $paciente->estado='activo';
        $paciente->save();
        flash('Paciente registrado correctamente','success');
        return redirect()->route('indice_pacientes');
    }
    public function store_paciente2(Request $request)
    {   
        $perfil=new Perfil($request->all());
        $perfil->save();
        //dd($perfil);
        $paciente=new Paciente;
        $paciente->perfil_id=$perfil->id;
        $paciente->tipo='no asegurado';
        $paciente->estado='activo';
        $paciente->save();
        flash('Paciente registrado correctamente','success');
        return redirect()->back();
    }

    public function actualizar_paciente(Request $request)
    {
        $paciente=Paciente::find($request->paciente_id);
        $perfil=Perfil::find($paciente->perfil_id);
        $perfil->fill($request->all());
        //dd($perfil);
        $perfil->save();
        //$paciente->fill($request->all());
        //$paciente->save();
        //dd($paciente,$perfil);
        flash('Paciente actualizado correctamente','success');
        return redirect()->route('indice_pacientes');
    }

    public function show_paciente($id)
    {
        $cuadernos=Cuaderno::where('paciente_id',$id)->get();
        $paciente=Paciente::find($id);
        $mordeduras=Mordedura::where('paciente_id',$id)->get();
        $certificados=Certificado::where('paciente_id',$id)->get();
        return view('pages.pacientes.show_paciente',compact('paciente','cuadernos','mordeduras','certificados'));
    }

    public function asegurar_paciente($id)
    {
        $paciente=Paciente::find($id);
        $paciente->tipo='asegurado';
        $paciente->save();
        return redirect()->back();
    }
}
