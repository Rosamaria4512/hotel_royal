<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('municipio',60);
            $table->string('lugar',60);
            $table->string('nombre',60);
            $table->string('direccion',60);
            $table->float('telefono',12);
            $table->string('correo',60);
            $table->string('foto');
            $table->string('descripcion');
            $table->string('tipo_actividad',60);
            $table->string('horario_atencion',60);
            $table->integer('estado')->length(1);
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
        Schema::dropIfExists('sites');
    }
}
