<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Perfil;
use App\Paciente;
use App\Dato;
use App\Pedriatico;
use App\Vacuna;
use App\Embarazo;
use App\Pregnancy;
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
        

        $permiso=new Permission;//|
        $permiso->name="administrar usuarios";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;//2
        $permiso->name="administrar permisos";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;//3
        $permiso->name="controlar pacientes";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;//4
        $permiso->name="registrar en sus";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;//5
        $permiso->name="atencion enfermeria";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;//6
        $permiso->name="registrar ordenes";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;//7
        $permiso->name="registrar resultados";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;//8
        $permiso->name="realizar certificados";
        $permiso->guard_name="web";
        $permiso->save();

        $permiso=new Permission;//9
        $permiso->name="reportes";
        $permiso->guard_name="web";
        $permiso->save();


        $rol=new Role;
        $rol->name='Administrador';
        $rol->guard_name='web';
        $rol->save();
        $rol->givePermissionTo(1,2);

        $rol=new Role;
        $rol->name='Doctor';
        $rol->guard_name='web';
        $rol->save();
        $rol->givePermissionTo(3,4,6,8);

        $rol=new Role;
        $rol->name='Laboratorista';
        $rol->guard_name='web';
        $rol->save();
        $rol->givePermissionTo(7);

        $rol=new Role;
        $rol->name='Enfermeria';
        $rol->guard_name='web';
        $rol->save();
        $rol->givePermissionTo(5);




        


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
        $p->estado_civil='Soltero/a';
        $p->save();

        $u=new User;
        $u->perfil_id=1;
        $u->tipo='admin';
        $u->email='admin@sedes.com';
        $u->password=bcrypt('123');
        $u->estado='activo';
        $u->save();
        $u->assignRole('Administrador');

        $p=new Perfil;
        $p->ci='12345679';
        $p->apellido_paterno='Rodriguez';
        $p->apellido_materno='Flores';
        $p->nombres='Marco';
        $p->fecha_nacimiento='1991-03-25';
        $p->ocupacion='Doctor';
        $p->direccion='calle #123';
        $p->telefono='77776543';
        $p->sexo='Masculino';
        $p->estado_civil='Soltero/a';
        $p->save();

        $u=new User;
        $u->perfil_id=$p->id;
        $u->email='doctor@sedes.com';
        $u->password=bcrypt('123');
        $u->estado='activo';
        $u->tipo='medico';
        $u->save();
        $u->assignRole('Doctor');

        $p=new Perfil;
        $p->ci='12345670';
        $p->apellido_paterno='Mamani';
        $p->apellido_materno=' ';
        $p->nombres='Miguel';
        $p->fecha_nacimiento='1991-03-25';
        $p->ocupacion='Laboratorista';
        $p->direccion='calle #123';
        $p->telefono='77776543';
        $p->sexo='Masculino';
        $p->estado_civil='Soltero/a';
        $p->save();

        $u=new User;
        $u->perfil_id=$p->id;
        $u->tipo='laboratorista';
        $u->email='lab@sedes.com';
        $u->password=bcrypt('123');
        $u->estado='activo';
        $u->save();
        $u->assignRole('Laboratorista');



        $p=new Perfil;
        $p->ci='12345670';
        $p->apellido_paterno='Ferreira';
        $p->apellido_materno='Arriaga';
        $p->nombres='Maria';
        $p->fecha_nacimiento='1991-03-25';
        $p->ocupacion='Enfermera';
        $p->direccion='calle #123';
        $p->telefono='77776543';
        $p->sexo='Femenino';
        $p->estado_civil='Soltero/a';
        $p->save();

        $u=new User;
        $u->perfil_id=$p->id;
        $u->tipo='enfermeria';
        $u->email='enfermeria@sedes.com';
        $u->password=bcrypt('123');
        $u->estado='activo';
        $u->save();
        $u->assignRole('Enfermeria');



//['fichero','medico','laboratorista','enfermeria','admin'















        //$u->givePermissionTo(1,2,3);



        $p=new Perfil;
        $p->ci='123457';
        $p->apellido_paterno='Fernandez';
        $p->apellido_materno='Rodriguez';
        $p->nombres='Fernando';
        $p->fecha_nacimiento='2000-01-01';
        $p->ocupacion='Ingeniero eléctrico';
        $p->direccion='Union s/n';
        $p->telefono='77757775';
        $p->sexo='Masculino';
        $p->estado_civil='Soltero/a';
        $p->save();

        $paciente=new Paciente;
        $paciente->perfil_id=$p->id;
        $paciente->estado='activo';
        $paciente->tipo='asegurado';
        $paciente->save();

        $dato=new Dato;
        //$dato->
        $dato->paciente_id=$paciente->id;
        $dato->idioma_hablado='Español';
        $dato->idioma_materno='Quechua';
        $dato->auto_pertenencia_cultural=' ';
        $dato->ocupacion_productiva='ocu prod';
        $dato->ocupacion_reproductiva='Ocu rep';
        $dato->gestion_comunitaria=' gest';
        $dato->quien_decidio='Pareja';
        $dato->escolaridad='Basico';
        $dato->grupo_sanguineo='O';
        $dato->factor_rh='+';
        $dato->otro=' ';
        $dato->establecimiento=' ';
        $dato->comunidad=' ';
        $dato->red=' ';
        $dato->municipio=' ';
        $dato->provincia=' ';
        $dato->no_hc='1';
        $dato->no_sumi=' ';
        $dato->observaciones='Ninguna';
        $dato->save();
        
        $ped=new Pedriatico;
        $ped->paciente_id=$paciente->id;
        $ped->save();
        
        $v=new Vacuna;
        $v->paciente_id=$paciente->id;
        $v->bcg=1;
        $v->polio=2;
        $v->dpt=3;
        $v->pentavalente=4;
        $v->sarampion=5;
        $v->triple_virica=4;
        $v->fiebre_amarilla=3;
        $v->hepatitis_b=2;
        $v->dt=1;
        $v->save();

        $embarazo=new Embarazo;
        $embarazo->paciente_id=$paciente->id;
        $embarazo->g=1;
        $embarazo->p=0;
        $embarazo->a=2;
        $embarazo->c=0;
        $embarazo->save();

        $preg= new Pregnancy;
        $preg->paciente_id=$paciente->id;
        $preg->anio=2020;
        $preg->duracion=8;
        $preg->tipo='vaginal';//cesarea
        $preg->vivos=1;
        $preg->muertos=0;
        $preg->aborto=' ';

    }
}
