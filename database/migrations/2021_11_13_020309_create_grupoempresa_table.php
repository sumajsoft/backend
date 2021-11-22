<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupoempresa', function (Blueprint $table) {
            $table->id();
            $table->string("nombreCorto")->unique();
            $table->string("nombreLargo");
            $table->string("fechaCreacion");
            $table->string("tipoSociedad");
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('nombreSocio1')->nullable();
            $table->string('nombreSocio2')->nullable();
            $table->string('nombreSocio3')->nullable();
            $table->string('nombreSocio4')->nullable();
            $table->string('nombreSocio5')->nullable();
            $table->string('logoPath')->nullable();
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
        Schema::dropIfExists('grupoempresa');
    }
}
