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
            $table->string('fecha');
            $table->string('edad');
            $table->string('talla');
            $table->string('peso');
            $table->string('temp');
            $table->string('fc');
            $table->string('pa');
            $table->string('fr');
            $table->text('subjetivo');
            $table->text('objetivo');
            $table->text('analisis');
            $table->text('plan_de_accion');
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
