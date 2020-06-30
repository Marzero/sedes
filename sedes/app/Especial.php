<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especial extends Model
{
    protected $tables="especiales";

    protected $fillable=[
        'orden_id',
        'edad',
        'fecha',
        'vih',
        'rpr',
        'serologico',
        'user_id',
        'tipo'
    ];

    public function orden()
    {
        return $this->BelongsTo(Orden::class);
    }
}
