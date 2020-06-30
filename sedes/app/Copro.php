<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copro extends Model
{
    protected $table="copros";

    protected $fillable=[
           'user_id',
           'paciente_id',
            'medico_solicitante',
            'edad',
            'fecha',
            'detalle',
            'user_id',
            'tipo'
    ];

    public function orden()
    {
        return $this->BelongsTo(Orden::class);
    }
}
