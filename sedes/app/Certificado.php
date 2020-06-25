<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    protected $table="certificados";

    protected $fillable=[
            'user_id',
            'paciente_id',
            'lugar',
            'fecha',
            'matricula',
            'detalle'
    ];

    public function paciente()
    {
        return $this->BelongsTo(Paciente::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    
}
