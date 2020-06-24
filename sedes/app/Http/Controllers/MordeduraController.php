<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mordedura;
use App\Receta;
use App\Cuaderno;
use App\Paciente;
use App\Perfil;
class MordeduraController extends Controller
{
    public function indice_mordeduras()
    {
        $mordeduras=Mordedura::all();
        return view('pages.mordeduras.indice_mordeduras',compact('mordeduras'));
    }


}
