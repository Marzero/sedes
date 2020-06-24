<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicacion extends Model
{
    protected $table="indicaciones";

    protected $fillable=[
            'receta_id',
            'medicamento',
            'cantidad',
            'indicaciones',
    ];

    public function receta()
    {
        return $this->BelongsTo(Receta::class);
    }
}
