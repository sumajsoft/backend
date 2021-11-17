<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvocatoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatoria', function (Blueprint $table) {
            $table->id();
            $table->string("titulo",30);
            $table->string("codigo",30)->nullable();
            $table->string("semestre",1)->nullable();
            $table->string("gestion",4)->nullable();
            $table->string('fechaPublicacion')->nullable();
            $table->string('pdfPath')->nullable();
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
        Schema::dropIfExists('convocatoria');
    }
}
