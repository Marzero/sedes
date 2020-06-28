<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuimicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quimicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('orden_id');
            $table->string('edad');
            $table->string('fecha');
            $table->string('glucosa')->nullable();
            $table->string('urea')->nullable();
            $table->string('creatinina')->nullable();
            $table->string('acido_urico')->nullable();
            $table->string('trigliceridos')->nullable();
            $table->string('colesterol')->nullable();
            $table->string('fosfatasa_alcalina')->nullable();
            $table->string('ldl')->nullable();
            $table->string('hdl')->nullable();
            $table->string('bili_directa')->nullable();
            $table->string('bili_indirecta')->nullable();
            $table->string('bili_total')->nullable();
            $table->string('gpt')->nullable();
            $table->string('got')->nullable();
            $table->string('proteinas')->nullable();
            $table->string('globulina')->nullable();
            $table->string('albumina')->nullable();
            $table->string('r')->nullable();
            $table->string('amilasa')->nullable();
            $table->string('calcio')->nullable();

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
        Schema::dropIfExists('quimicas');
    }
}
