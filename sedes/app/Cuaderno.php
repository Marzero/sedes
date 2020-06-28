<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuaderno extends Model
{
    protected $table="cuadernos";

    protected $fillable=[
       /*'user_id',
       'paciente_id',
       'ci',
       'nombre',
       'estado_civil',
       'fecha',
       'dato',
       'edad',
       'diagnostico',
       'receta',
       'nro_ficha'*/

 
            'user_id',
            'paciente_id',
            'edad',
            'fecha',
            'dato',
            'diagnostico',
            'nro_ficha',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
}
