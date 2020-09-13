<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregnancy extends Model
{
    protected $table="pregnancies";

    protected $fillable=[
        'paciente_id',
        'anio',
        'duracion',
        'tipo',
        'tipo',
        'vivos',
        'muertos',
        'aborto',
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
