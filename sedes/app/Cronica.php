<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronica extends Model
{
    protected $table="cronicas";

    protected $fillable=[
        'paciente_id',
        'inicio',
        'medicamento',
        'dosificacion',
        'final',
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
