<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificado;
use App\User;
use App\Perfil;
use App\Paciente;
class CertificadoController extends Controller
{
    public function indice_certificados()
    {
        $pacientes=Paciente::all();
        $certificados=Certificado::all();
        return view('pages.certificados.indice_certificados',compact('certificados','pacientes'));
    }

    public function show_certificado($id)
    {
        $c=Certificado::find($id);
        return view('pages.certificados.show_certificado',compact('c'));
    }

    public function store_certificado(Request $request)
    {
        //dd($request);
        $c=new Certificado($request->all());
        $c->user_id=auth()->user()->id;
        //dd($c);
        $c->save();
        flash('Certificado guardado correctamente','success');
        return redirect()->route('show_certificado',$c->id);
    }
    /*
      
      $table->UnsignedBigInteger('user_id');
        $table->UnsignedBigInteger('paciente_id');
        $table->string('lugar');
        $table->string('fecha');
        $table->string('matricula');
        $table->text('detalle');
     */
}
