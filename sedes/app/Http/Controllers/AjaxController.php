<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AjaxController extends Controller
{
    public function asignar_permiso(Request $request)
    {
        //return $request->permiso;
        $user=User::find($request->usuario);
        $permiso=Permission::find($request->permiso);
        //return $permiso;
        if($user->hasPermissionTo($permiso->id))
        {
        	$user->revokePermissionTo($permiso->id);
        	echo json_encode("Permiso revocado");
        }else
        {
        	$user->givePermissionTo($permiso->id);
        	echo json_encode("Permiso otorgado");
        }
    }

    public function refrescar($id)
    {
        //dd($id);
        if($id=='todos'){
            $permisos=Permission::orderBy('id','asc')->get();
            echo json_encode($permisos);
            //echo json_encode("todos los permisos");
        }else{
            //$subsistema=Subsistema::find($id);
            $permisos=Permission::where('subsistema_id',$id)->get();
            echo json_encode($permisos);
        }   
    }
}
