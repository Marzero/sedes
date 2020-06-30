<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quimica extends Model
{
    protected $table="quimicas";

    protected $fillable=[
            'orden_id',
            'edad',
            'fecha',
            'glucosa',
            'urea',
            'creatinina',
            'acido_urico',
            'trigliceridos',
            'colesterol',
            'fosfatasa_alcalina',
            'ldl',
            'hdl',
            'bili_directa',
            'bili_indirecta',
            'bili_total',
            'gpt',
            'got',
            'proteinas',
            'globulina',
            'albumina',
            'r',
            'amilasa',
            'calcio',
            'user_id',
            'tipo'
    ];

    public function orden()
    {
        return $this->BelongsTo(Orden::class);
    }
}
