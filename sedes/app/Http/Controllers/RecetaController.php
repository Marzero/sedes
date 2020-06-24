<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuaderno;
use App\Paciente;
use App\Perfil;
use App\Receta;
use App\Indicacion;
class RecetaController extends Controller
{
    public function show_receta($id)
    {
        $r=Receta::find($id);
        return view('pages.medico.recetas.show_receta',compact('r'));
    }

    public function store_receta(Request $request)
    {
        $r=new Receta;
        $r->cuaderno_id=$request->cuaderno_id;
        $r->fecha=date('Y-m-d');
        $r->save();
        flash('receta creada correctamente','success');
        return redirect()->route('show_receta',$r->id);
    }

    public function agregar_indicacion(Request $request)
    {
        $i=new Indicacion($request->all());
        $i->save();
        flash('medicamento agregadaocorrectamente','success');
        return redirect()->back();
        //return redirect()->route('show_receta',$i->receta_id);
    }

    public function crear_receta_cuaderno($id)
    {
        //recibe el id de un registro de cuaderno medico para crearle una receta rapida
        $r=new Receta;
        $r->cuaderno_id=$id;
        $r->fecha=date('Y-m-d');
        $r->save();
        flash('Receta creada correctamente','success');
        return redirect()->back();
    }
}
