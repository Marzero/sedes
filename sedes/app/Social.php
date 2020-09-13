<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table="sociales";

    protected $fillable=[
        'paciente_id',
        'procedencia',
        'viajes_a',
        'otros'
    ];


    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
