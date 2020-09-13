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
    
    public function mordeduras()
    {
        return $this->HasMany(Mordedura::class);
    }

    public function certificados()
    {
        return $this->HasMany(Certificado::class);
    }

    public function ordenes()
    {
        return $this->HasMany(Orden::class);
    }

    public function enfermerias()
    {
        return $this->HasMany(Enfermeria::class);
    }


    public function pedriatico()
    {
        return $this->HasOne(Pedriatico::class);
    }
    public function vacuna()
    {
        return $this->HasOne(Vacuna::class);
    }
    public function embarazo()
    {
        return $this->HasOne(Embarazo::class);
    }
    public function pregnancies()
    {
        return $this->HasMany(Pregnancy::class);
    }
    public function paps()
    {
        return $this->HasMany(Pap::class);
    }
    public function anticoncepciones()
    {
        return $this->HasMany(Anticoncepcion::class);
    }
    public function patologicos()
    {
        return $this->HasMany(Patologico::class);
    }
    public function cronicas()
    {
        return $this->HasMany(Cronica::class);
    }
    public function riesgos()
    {
        return $this->HasMany(Riesgo::class);
    }
    public function sociales()
    {
        return $this->HasOne(Social::class);
    }

    
}
