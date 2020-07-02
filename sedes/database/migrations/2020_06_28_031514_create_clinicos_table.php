<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('orden_id');
            $table->string('edad');
            $table->string('fecha');
            $table->string('eritrocitos')->nullable();
            $table->string('hematrocito')->nullable();
            $table->string('hemoglobina')->nullable();
            $table->string('vcm')->nullable();
            $table->string('hcm')->nullable();
            $table->string('chcm')->nullable();
            $table->string('sedimentacion_globular')->nullable();
            $table->string('primera_hora')->nullable();
            $table->string('segunda_hora')->nullable();
            $table->string('indice_kats')->nullable();
            $table->string('grupo_sanguineo')->nullable();
            $table->string('factor_rh')->nullable();
            $table->string('plaquetas')->nullable();
            $table->string('reticulocitos')->nullable();
            $table->string('leucocitos')->nullable();
            $table->string('basofilo')->nullable();
            $table->string('eosinofilos')->nullable();
            $table->string('mielositos')->nullable();
            $table->string('metamielositos')->nullable();
            $table->string('bastonados')->nullable();
            $table->string('segmentados')->nullable();
            $table->string('linfocitos')->nullable();
            $table->string('monocitos')->nullable();
            $table->string('t_de_coagulacion')->nullable();
            $table->string('t_desangria')->nullable();
            $table->string('t_de_protombina')->nullable();
            $table->string('c_protombina')->nullable();
            $table->string('irn')->nullable();
            $table->string('glucosa')->nullable();
            $table->string('creatinina')->nullable();
            $table->UnsignedBigInteger('user_id');
            $table->string('tipo')->default('interno');
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
        Schema::dropIfExists('clinicos');
    }
}
