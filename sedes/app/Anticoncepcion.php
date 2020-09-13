<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anticoncepcion extends Model
{
    protected $table="anticoncepciones";

    protected $fillable=[
        'paciente_id',
        'inicio',
        'metodo',
    ];

    public function peciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
