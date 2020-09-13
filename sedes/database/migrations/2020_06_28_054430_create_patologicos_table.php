<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatologicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patologicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('paciente_id');
            $table->string('hospitalizaciones_por');
            $table->integer('anio');
            $table->string('evolucion');
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
        Schema::dropIfExists('patologicos');
    }
}
