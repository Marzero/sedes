<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmbarazosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embarazos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('paciente_id');
            $table->integer('g')->nullable();
            $table->integer('p')->nullable();
            $table->integer('a')->nullable();
            $table->integer('c')->nullable();
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
        Schema::dropIfExists('embarazos');
    }
}
