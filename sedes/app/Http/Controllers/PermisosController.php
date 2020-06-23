<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Perfil;
class PermisosController extends Controller
{
    public function indice_permisos()
    {
        $permisos=Permission::all();
        return view('pages.admin.permisos.indice_permisos',compact('permisos'));
    }

    public function nuevo_permiso()
    {
        return view('pages.admin.permisos.nuevo_permiso');
    }

    public function guardar_permiso(Request $request)
    {
        $p=new Permission;
        $p->name=$request->name;
        $p->guard_name='web';
        $p->save();
        flash('Permiso guardado correctamente','success');
        return redirect()->route('indice_permisos');
    }
}
