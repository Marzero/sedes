<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMordedurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mordeduras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paciente_id')->nullable();
            
            $table->string('municipio');
            $table->string('establecimiento');
            $table->string('nombre');
            $table->string('sexo');
            $table->string('edad');
            $table->string('direccion');
            $table->string('fecha_mordedura');
            $table->string('donde');
            $table->string('localizacion');
            $table->string('herida');
            $table->string('tipo_herida');
            $table->string('especie');
            $table->string('vacunacion_anterior');
            $table->string('fecha_vacunacion_anterior')->nullable();
            $table->string('vacuna_antirrabica');
            $table->string('v1')->nullable();
            $table->string('v2')->nullable();
            $table->string('v3')->nullable();
            $table->string('v4')->nullable();
            $table->string('v5')->nullable();
            $table->string('v6')->nullable();
            $table->string('v7')->nullable();
            $table->string('v10')->nullable();
            $table->string('v20')->nullable();
            $table->string('v30')->nullable();
            $table->string('fecha_suero')->nullable();
            $table->string('tipo')->nullable();
            $table->string('nro_lote')->nullable();
            //$table->string('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mordeduras');
    }
}
