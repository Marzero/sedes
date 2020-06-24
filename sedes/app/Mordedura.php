<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mordedura extends Model
{
    protected $table="mordeduras";

    protected $fillable=[
            'user_id',
            'paciente_id',
            'municipio',
            'establecimiento',
            'nombre',
            'sexo',
            'edad',
            'direccion',
            'fecha_mordedura',
            'donde',
            'localizacion',
            'herida',
            'tipo_herida',
            'especie',
            'vacunacion_anterior',
            'fecha_vacunacion_anterior',
            'vacuna_antirrabica',
            'v1',
            'v2',
            'v3',
            'v4',
            'v5',
            'v6',
            'v7',
            'v10',
            'v20',
            'v30',
            'fecha_suero',
            'tipo',
            'nro_lote',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function paciente()
    {
        return $this->Belongsto(Paciente::class);
    }
}
