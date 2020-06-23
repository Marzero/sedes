<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Paciente;
class Chequeo extends Model
{
    protected $table="chequeos";
    protected $fillable=[
        'user_id',
        'paciente_id',
        'fecha',
        'edad',
        'talla',
        'peso',
        'temp',
        'fc',
        'pa',
        'fr',
        'subjetivo',
        'objetivo',
        'analisis',
        'plan_de_accion'
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
