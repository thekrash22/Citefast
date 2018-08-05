<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadSaludMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidad_salud_medico', function (Blueprint $table) {
          $table->integer('entidad_salud_id')->unsigned();
          $table->integer('medico_id')->unsigned();
          $table->foreign('entidad_salud_id')->references('id')->on('entidad_salud')
                ->onUpdate('cascade')
                ->onDelete('cascade');
          $table->foreign('medico_id')->references('id')->on('medicos')
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
        Schema::dropIfExists('entidad_salud_medico');
    }
}
