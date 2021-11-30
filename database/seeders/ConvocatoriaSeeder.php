<?php

namespace Database\Seeders;

use App\Models\Convocatoria;
use Illuminate\Database\Seeder;

class ConvocatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

      Convocatoria::factory(50)->create();
    //  $c = new Convocatoria();
    //  $c->titulo = "Convocatoria 1";
    //  $c->codigo = "IPTIS 2022";
    //  $c->semestre = "2";
    //  $c->gestion = "2022";
    //  $c->fechaPublicacion = "10-05-2022";
    //  $c->save();
    }
}
