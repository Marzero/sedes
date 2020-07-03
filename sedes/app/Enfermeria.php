<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermeria extends Model
{
    protected $table="enfermerias";

    protected $fillable=[
           'fecha',
           'ficha',
            'paciente_id',
           'edad',
           'doctor_id',
           'detalle',
           'dato',
            'user_id',
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::Class);
    }


}
