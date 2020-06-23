<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perfil;
use App\Chequeo;
class Paciente extends Model
{
    protected $table="pacientes";
    protected $fillable=[
            'perfil_id',
            'tipo',
            'estado',
            'extra'
    ];

    public function perfil()
    {
        return $this->BelongsTo(Perfil::class);
    }

    public function chequeos()
    {
        return $this->HasMany(Chequeo::class);
    }

    public function cuadernos()
    {
        return $this->HasMany(Cuaderno::class);
    }
}
