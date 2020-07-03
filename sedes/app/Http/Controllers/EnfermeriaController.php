<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enfermeria;
use App\User;

class EnfermeriaController extends Controller
{
    public function indice_enfermerias()
    {
        $enfermerias=Enfermeria::all();
        return view('pages.enfermerias.indice_enfermerias',compact('enfermerias'));
    }

    
}
