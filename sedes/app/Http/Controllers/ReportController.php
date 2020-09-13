<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paciente;
class ReportController extends Controller
{
    public function reportes()
    {
        $users=User::all();
        $pacientes=Paciente::all();
        return view('reportes.reportes',compact('users','pacientes'));
    }

    
}
