<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quimica;
use App\Orden;
class QuimicaController extends Controller
{
    public function indice_quimicas(Request $request)
    {
        $quimicas=Quimica::all();
        $ordenes=Orden::where('tipo','quimica')->get();
        return view('pages.examenes.quimicas.indice_quimicas',compact('quimicas','ordenes'));
    }
}
