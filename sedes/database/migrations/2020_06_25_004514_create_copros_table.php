<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('orden_id');
            $table->string('edad');
            $table->string('fecha');
            $table->string('detalle');
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
        Schema::dropIfExists('copros');
    }
}
