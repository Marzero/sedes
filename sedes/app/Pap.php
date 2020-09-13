<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pap extends Model
{
    protected $table="paps";

    protected $fillable=[
        'paciente_id',
        'fecha',
        'resultado',
    ];

    public function peciente()
    {
        return $this->BelongsTo(Paciente::class);
    }

}