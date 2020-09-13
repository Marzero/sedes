<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riesgo extends Model
{
    protected $table="riesgos";

    protected $fillable=[
        'paciente_id',
        'factor',
        'personal',
        'familiar'
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
