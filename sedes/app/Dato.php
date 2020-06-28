<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    protected $table="datos";
    protected $fillable=[
        'paciente_id',
        'idioma_hablado',
        'idioma_materno',
        'auto_pertenencia_cultural',
        'ocupacion_productiva',
        'ocupacion_reproductiva',
        'gestion_comunitaria',
        'quien_decidio',
        'escolaridad',
        'grupo_sanguineo',
        'factor_rh',
        'otro',
        'establecimiento',
        'comunidad',
        'red',
        'municipio',
        'provincia',
        'no_hc',
        'no_sumi',
        'observaciones',
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
