<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Embarazo extends Model
{
    protected $table="embarazos";

    protected $fillable=[
        'paciente_id',
        'g',
        'p',
        'a',
        'c'
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
