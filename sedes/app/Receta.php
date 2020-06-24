<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table="recetas";

    protected $fillable=[
        'cuaderno_id',
        'mordida_id',
        'fecha'
    ];

    public function indicaciones()
    {
        return $this->HasMany(Indicacion::class);
    }
}
