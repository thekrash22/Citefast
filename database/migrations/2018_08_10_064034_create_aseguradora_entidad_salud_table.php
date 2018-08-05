<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAseguradoraEntidadSaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aseguradora_entidad_salud', function (Blueprint $table) {
            $table->integer('aseguradora_id')->unsigned();
            $table->integer('entidad_salud_id')->unsigned();
            $table->foreign('aseguradora_id')->references('id')->on('aseguradoras')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('entidad_salud_id')->references('id')->on('entidad_salud')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aseguradora_entidad_salud');
    }
}
