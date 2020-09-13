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
use App\Pedriatico;
use App\Vacuna;
use App\Embarazo;
use App\Pregnancy;
use App\Pap;
use App\Anticoncepcion;
use App\Patologico;
use App\Cronica;
use App\Riesgo;
use App\Social;
use App\Chequeo;
class PacienteController extends Controller
{
    public function indice_pacientes()
    {
        $pacientes=Paciente::all();
        return view('pages.pacientes.indice_pacientes',compact('pacientes'));
    }

    public function store_paciente(Request $request)
    {   
        $request->validate([
            'ci' => 'required|unique:perfiles,ci|max:12',
        ]);
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
        $request->validate([
            'ci' => 'required|unique:perfiles,ci|max:12',
        ]);
        $perfil=new Perfil($request->all());
        $perfil->save();
        //dd($perfil);
        $paciente=new Paciente;
        $paciente->perfil_id=$perfil->id;
        $paciente->tipo='no asegurado';
        $paciente->estado='activo';
        $paciente->save();
        flash('Paciente registrado correctamente..','success');
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

        $dato=Dato::where('paciente_id',$paciente->id)->first();
        $ped=Pedriatico::where('paciente_id',$paciente->id)->first();
        $vacuna=Vacuna::where('paciente_id',$paciente->id)->first();
        $embarazo=Embarazo::where('paciente_id',$paciente->id)->first();
        $pregnancies=Pregnancy::where('paciente_id',$paciente->id)->get();
        $paps=Pap::where('paciente_id',$paciente->id)->get();
        $anticoncepciones=Anticoncepcion::where('paciente_id',$paciente->id)->get();
        $patologicos=Patologico::where('paciente_id',$paciente->id)->get();
        $cronicas=Cronica::where('paciente_id',$paciente->id)->get();
        $riesgos=Riesgo::where('paciente_id',$paciente->id)->get();
        $social=Social::where('paciente_id',$paciente->id)->first();
        $chequeos=Chequeo::where('paciente_id',$paciente->id)->get();
        //dd($chequeos);
        return view('pages.pacientes.show_paciente',compact('paciente','cuadernos','mordeduras','certificados','dato','ped','vacuna','embarazo','pregnancies','paps','anticoncepciones','patologicos','cronicas','riesgos','social','chequeos'));
    }

    public function asegurar_paciente(Request $request)
    {
        //dd($request);
        $paciente=Paciente::find($request->id_paciente);
        $paciente->tipo='asegurado';
        $paciente->save();

        $dato=new Dato($request->all());
        $dato->paciente_id=$paciente->id;
        //dd($dato);
        $dato->save();

        $ped=new Pedriatico;
        $ped->paciente_id=$paciente->id;
        $ped->save();

        $v=new Vacuna;
        $v->paciente_id=$paciente->id;
        $v->bcg=0;
        $v->polio=0;
        $v->dpt=0;
        $v->pentavalente=0;
        $v->sarampion=0;
        $v->triple_virica=0;
        $v->fiebre_amarilla=0;
        $v->hepatitis_b=0;
        $v->dt=0;
        $v->save();

        $embarazo=new Embarazo;
        $embarazo->paciente_id=$paciente->id;
        $embarazo->g=0;
        $embarazo->p=0;
        $embarazo->a=0;
        $embarazo->c=0;
        $embarazo->save();


        flash('Registro de identificación del paciente/usuario completado correctamente');
        return redirect()->back();
    }

    public function edit_antecedentes_pedriaticos(Request $request)
    {
        $ped=Pedriatico::find($request->ped_id);

        $ped->fill($request->all());
        //dd($ped);
        $ped->save();
        flash('Datos pedriaticos editados Correctamente','warning');
        return redirect()->route('show_paciente',$ped->paciente_id);
    }

    public function edit_vacunas(Request $request)
    {
        $va=Vacuna::find($request->vacuna_id);
        $va->fill($request->all());
        $va->save();
        flash('Datos de vacunas editados Correctamente','warning');
        return redirect()->route('show_paciente',$va->paciente_id);
    }

    public function edit_embarazos(Request $request)
    {
        $var=Embarazo::find($request->embarazo_id);
        $var->fill($request->all());
        $var->save();
        flash('Datos de embarazo editados Correctamente','warning');
        return redirect()->route('show_paciente',$var->paciente_id);
    }

    public function add_pregnancy(Request $request)
    {
        $preg=new Pregnancy($request->all());
        //dd($preg);
        $preg->save();
        flash('Datos de embarazo editados Correctamente','warning');
        return redirect()->route('show_paciente',$preg->paciente_id);
    }
    
    public function edit_pregnancy(Request $request)
    {
        $preg=Pregnancy::find($request->pregnancy_id);
        $preg->fill($request->all());
        //dd($preg);
        $preg->save();
        flash('Datos de embarazo editados Correctamente','warning');
        return redirect()->route('show_paciente',$preg->paciente_id);
    }

    public function add_pap(Request $request)
    {
        //dd($request);
        $pap=new Pap($request->all());
        //dd($pap);
        $pap->save();
        flash('Datos de pap agregados Correctamente','success');
        return redirect()->route('show_paciente',$pap->paciente_id);
    }

    public function add_anticoncepcion(Request $request)
    {
        //dd($request);
        $anti=new Anticoncepcion($request->all());
        //dd($pap);
        $anti->save();
        flash('Datos de anticoncepcion agregados Correctamente','success');
        return redirect()->route('show_paciente',$anti->paciente_id);
    }

    public function add_patologico(Request $request)
    {
        $pato=new Patologico($request->all());
        //dd($pap);
        $pato->save();
        flash('Datos de antecedentes patológicos agregados Correctamente','success');
        return redirect()->route('show_paciente',$pato->paciente_id);
    }

    public function add_cronica(Request $request)
    {
        $cronica=new Cronica($request->all());
        $cronica->save();
        flash('Datos de enfermedades cronicas guardados correctamente','success');
        return redirect()->route('show_paciente',$cronica->paciente_id); 
    }

    public function add_riesgo(Request $request)
    {
        $riesgo=new Riesgo($request->all());
        $riesgo->save();
        flash('Datos de enfermedades cronicas guardados correctamente','success');
        return redirect()->route('show_paciente',$riesgo->paciente_id); 
    }

    public function add_social(Request $request)
    {
        $social=new Social($request->all());
        $social->save();
        flash('Datos de enfermedades cronicas guardados correctamente','success');
        return redirect()->route('show_paciente',$social->paciente_id); 
    }
    public function add_chequeo(Request $request)
    {
        $che=new Chequeo($request->all());
        $che->save();
        flash('chequeo agregado correctamente','success');
        return redirect()->route('show_paciente',$che->paciente_id); 
    }

    public function impresion_sus($id)
    {
        
        $paciente=Paciente::find($id);

        $dato=Dato::where('paciente_id',$paciente->id)->first();
        $ped=Pedriatico::where('paciente_id',$paciente->id)->first();
        $vacuna=Vacuna::where('paciente_id',$paciente->id)->first();
        $embarazo=Embarazo::where('paciente_id',$paciente->id)->first();
        $pregnancies=Pregnancy::where('paciente_id',$paciente->id)->get();
        $paps=Pap::where('paciente_id',$paciente->id)->get();
        $anticoncepciones=Anticoncepcion::where('paciente_id',$paciente->id)->get();
        $patologicos=Patologico::where('paciente_id',$paciente->id)->get();
        $cronicas=Cronica::where('paciente_id',$paciente->id)->get();
        $riesgos=Riesgo::where('paciente_id',$paciente->id)->get();
        $social=Social::where('paciente_id',$paciente->id)->first();
        $chequeos=Chequeo::where('paciente_id',$paciente->id)->get();

        $view = view('pages.pacientes.impresion_sus',compact('paciente','dato','ped','vacuna','embarazo','pregnancies','paps','anticoncepciones','patologicos','cronicas','riesgos','social','chequeos'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("letter", "Portrait");
        $pdf->loadHTML($view);
        return $pdf->stream('paciente','dato','ped','vacuna','embarazo','pregnancies','paps','anticoncepciones','patologicos','cronicas','riesgos','social','chequeos');
    }



    
}
