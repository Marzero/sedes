<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Paciente;
class Perfil extends Model
{
    protected $table="perfiles";

    protected $fillable=[
        'ci',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'ocupacion',
        'direccion',
        'telefono',
        'sexo'
    ];

    public function user()
    {
        return $this->HasOne(User::class);
    }

    public function paciente()
    {
        return $this->HasOne(Paciente::class);
    }
}
