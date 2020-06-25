<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copro extends Model
{
    protected $table="copros";

    protected $fillable=[
           'user_id',
           'paciente_id',
            'medico_solicitante',
            'edad',
            'fecha',
            'detalle',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    
    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
