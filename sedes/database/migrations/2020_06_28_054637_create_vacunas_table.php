<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('paciente_id');
            $table->integer('bcg')->nullable();
            $table->integer('polio')->nullable();
            $table->integer('dpt')->nullable();
            $table->integer('pentavalente')->nullable();
            $table->integer('sarampion')->nullable();
            $table->integer('triple_virica')->nullable();
            $table->integer('fiebre_amarilla')->nullable();
            $table->integer('hepatitis_b')->nullable();
            $table->integer('dt')->nullable();
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
        Schema::dropIfExists('vacunas');
    }
}
