<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table="generales";

    protected $fillable=[
       'orden_id',
        'edad',
        'fecha',
        'volumen',
        'densidad',
        'color',
        'aspecto',
        'olor',
        'espuma',
        'ph',
        'proteinas',
        'sangre',
        'glucosa',
        'urobilinogeno',
        'cetonas',
        'bilirrubinas',
        'nitritos',
        'cel_epiteliales',
        'cel_renales',
        'cristales',
        'uratos',
        'fosfatos',
        'leucocitos',
        'piocitos',
        'eritrocitos',
        'cilindros_hialinos',
        'cilindros_granulosos',
        'cilindros_mixtos',
        'cilindros_hematicos',
        'cilindros_leucocitarios',
        'flora_microbiana',
        'filiamento_mucoso',
        'hifas_esporas',
    ];

    public function orden()
    {
        return $this->BelongsTo(Orden::class);
    }
}
