<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado');
            $table->dateTime('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin')->nullable();
            $table->longText('observaciones')->nullable();
            $table->unsignedInteger('tipo_cita_id');
            $table->unsignedInteger('paciente_id');
            $table->unsignedInteger('medico_id');
            $table->unsignedInteger('entidad_salud_id');
            $table->foreign('tipo_cita_id')
                  ->references('id')->on('tipo_cita')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('paciente_id')
                  ->references('id')->on('pacientes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('medico_id')
                  ->references('id')->on('medicos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('entidad_salud_id')
                  ->references('id')->on('entidad_salud')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('citas');
    }
}
