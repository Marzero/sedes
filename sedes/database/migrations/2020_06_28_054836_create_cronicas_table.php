<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('paciente_id');
            $table->string('inicio')->nullable();
            $table->string('medicamento')->nullable();
            $table->string('dosificacion')->nullable();
            $table->string('final')->nullable();
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
        Schema::dropIfExists('cronicas');
    }
}
