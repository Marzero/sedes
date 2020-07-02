<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\General;
class GeneralController extends Controller
{
    public function indice_generales(Request $request)
    {
        $generales=General::all();
        $ordenes=Orden::where('tipo','general')->get();
        return view('pages.examenes.generales.indice_generales',compact('generales','ordenes'));
    }
}
