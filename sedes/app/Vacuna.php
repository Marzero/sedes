<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    protected $table="vacunas";

    protected $fillable=[
           'paciente_id',
           'bcg',
           'polio',
           'dpt',
           'pentavalente',
           'sarampion',
           'triple_virica',
           'fiebre_amarilla',
           'hepatitis_b',
           'dt',
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
