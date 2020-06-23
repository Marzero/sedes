<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('responsable_id')->nullable();
            $table->UnsignedBigInteger('paciente_id')->nullable();
            $table->string('idioma_hablado')->nullable();
            $table->string('idioma_materno')->nullable();
            $table->string('auto_pertenencia_cultural')->nullable();
            $table->string('ocupacion_productiva')->nullable();
            $table->string('ocupacion_reproductiva')->nullable();
            $table->string('gestion_comunitaria')->nullable();
            $table->string('quien_decidio')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('escolaridad')->nullable();
            $table->string('grupo_sanguineo')->nullable();
            $table->string('factor_rh')->nullable();
            $table->string('otro')->nullable();
            $table->string('establecimiento')->nullable();
            $table->string('comunidad')->nullable();
            $table->string('red')->nullable();
            $table->string('municipio')->nullable();
            $table->string('provincia')->nullable();
            $table->string('no_hc')->nullable();
            $table->string('no_sumi')->nullable();
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('datos');
    }
}
