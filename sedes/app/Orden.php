<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table="ordenes";

    protected $fillable=[
        'user_id',
        'paciente_id',
        'detalle',
        'tipo',
        'estado',
    ];
    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }

    public function copros()
    {
        return $this->HasMany(Copro::class);
    }

    public function especiales()
    {
        return $this->HasMany(Especial::class);
    }
    
    public function clinicos()
    {
        return $this->HasMany(Clinico::class);
    }

    public function generales()
    {
        return $this->HasMany(General::class);
    }

    public function quimicos()
    {
        return $this->HasMany(Quimico::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
