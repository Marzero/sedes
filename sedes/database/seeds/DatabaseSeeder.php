<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Perfil;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permiso=new Permission;
        $permiso->name="administrar usuarios";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;
        $permiso->name="administrar permisos";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;
        $permiso->name="controlar pacientes";
        $permiso->guard_name="web";
        $permiso->save();



        $p=new Perfil;
        $p->ci='1234567';
        $p->apellido_paterno='Lopez';
        $p->apellido_materno='Gomez';
        $p->nombres='Fulano';
        $p->fecha_nacimiento='1991-03-25';
        $p->ocupacion='Administrador';
        $p->direccion='calle #123';
        $p->telefono='77776543';
        $p->sexo='Masculino';
        $p->save();



        $u=new User;
        $u->perfil_id=1;
        $u->email='admin@gmail.com';
        $u->password=bcrypt('123');
        $u->estado='activo';
        $u->save();




        $u->givePermissionTo(1,2,3);

    }
}
