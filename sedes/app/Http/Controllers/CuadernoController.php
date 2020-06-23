<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuaderno;
use App\Paciente;
use App\Perfil;
class CuadernoController extends Controller
{
    public function inicio_cuadernos()
    {
        $cuadernos=Cuaderno::all();
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
        dd($request);
    }
}
