<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinico extends Model
{
    protected $table="clinicos";

    protected $fillable=[
            'orden_id',
           'edad',
           'fecha',
            'eritrocitos',
            'hematrocito',
            'hemoglobina',
            'vcm',
            'hcm',
            'chcm',
            'sedimentacion_globular',
            'primera_hora',
            'segunda_hora',
            'indice_kats',
            'grupo_sanguineo',
            'factor_rh',
            'plaquetas',
            'reticulocitos',
            'leucocitos',
            'basofilo',
            'eosinofilos',
            'mielositos',
            'metamielositos',
            'bastonados',
            'segmentados',
            'linfocitos',
            'monocitos',
            't_de_coagulacion',
            't_desangria',
            't_de_protombina',
            'irn',
            'glucosa',
            'creatinina',
    ];

    public function orden()
    {
        return $this->BelongsTo(Orden::class);
    }
}
