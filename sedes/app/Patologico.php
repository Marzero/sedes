<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patologico extends Model
{
    protected $table="patologicos";

    protected $fillable=[
        'paciente_id',
        'hospitalizaciones_por',
        'anio',
        'evolucion',
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
