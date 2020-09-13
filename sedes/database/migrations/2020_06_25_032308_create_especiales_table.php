<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especiales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('orden_id');
            $table->string('edad');
            $table->string('fecha');
            $table->string('vih');
            $table->string('rpr');
            $table->text('serologico');
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
        Schema::dropIfExists('especiales');
    }
}
