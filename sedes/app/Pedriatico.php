<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedriatico extends Model
{
    protected $table="pedriaticos";

    protected $fillable=[
        'paciente_id',
        'peso_rn',
        'tipo_parto',
        'obs_perinatales',
        'lactancia',
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
