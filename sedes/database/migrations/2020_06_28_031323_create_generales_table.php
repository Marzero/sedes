<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('orden_id');
            $table->string('edad');
            $table->string('fecha');
            $table->string('volumen')->nullable();
            $table->string('densidad')->nullable();
            $table->string('color')->nullable();
            $table->string('aspecto')->nullable();
            $table->string('olor')->nullable();
            $table->string('espuma')->nullable();
            $table->string('ph')->nullable();
            $table->string('proteinas')->nullable();
            $table->string('sangre')->nullable();
            $table->string('glucosa')->nullable();
            $table->string('urobilinogeno')->nullable();
            $table->string('cetonas')->nullable();
            $table->string('bilirrubinas')->nullable();
            $table->string('nitritos')->nullable();
            $table->string('cel_epiteliales')->nullable();
            $table->string('cel_renales')->nullable();
            $table->string('cristales')->nullable();
            $table->string('uratos')->nullable();
            $table->string('fosfatos')->nullable();
            $table->string('leucocitos')->nullable();
            $table->string('piocitos')->nullable();
            $table->string('eritrocitos')->nullable();
            $table->string('cilindros_hialinos')->nullable();
            $table->string('cilindros_granulosos')->nullable();
            $table->string('cilindros_mixtos')->nullable();
            $table->string('cilindros_hematicos')->nullable();
            $table->string('cilindros_leucocitarios')->nullable();
            $table->text('otros')->nullable();
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
        Schema::dropIfExists('generales');
    }
}
