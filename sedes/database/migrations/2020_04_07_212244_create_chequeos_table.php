<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chequeos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paciente_id');
            $table->string('fecha')->nullable();
            $table->string('edad')->nullable();
            $table->string('talla')->nullable();
            $table->string('peso')->nullable();
            $table->string('temp')->nullable();
            $table->string('fc')->nullable();
            $table->string('pa')->nullable();
            $table->string('fr')->nullable();
            $table->text('subjetivo')->nullable();
            $table->text('objetivo')->nullable();
            $table->text('analisis')->nullable();
            $table->text('plan_de_accion')->nullable();
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
        Schema::dropIfExists('chequeos');
    }
}
