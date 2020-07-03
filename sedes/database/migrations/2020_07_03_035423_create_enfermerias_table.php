<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermeriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermerias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fecha');
            $table->string('ficha');
            $table->UnsignedBigInteger('paciente_id');
            $table->string('edad');
            $table->string('doctor_id');
            $table->string('detalle');
            $table->string('dato');
            $table->UnsignedBigInteger('user_id');
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
        Schema::dropIfExists('enfermerias');
    }
}
