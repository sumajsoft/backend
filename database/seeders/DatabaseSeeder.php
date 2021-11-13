<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Convocatoria;
use App\Models\GrupoEmpresa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $c1 = new Convocatoria();
        $c1->titulo = "Convocatoria 1";
        $c1->codigo = "2002";
        $c1->semestre = "2";
        $c1->gestion = "2022";
        $c1->archivo = 'imagenes/img.png';
        $c1->save();
        
        $c2 = new Convocatoria();
        $c2->titulo = "Convocatoria 2";
        $c2->codigo = "2025";
        $c2->semestre = "2";
        $c2->gestion = "2020";
        $c2->archivo = 'juan/img.png';
        $c2->save();

        $c3 = new Convocatoria();
        $c3->titulo = "Convocatoria 3";
        $c3->codigo = "2222";
        $c3->semestre = "1";
        $c3->gestion = "2020";
        $c3->archivo = 'imagenes/alberto.png';
        $c3->save();
        
        $c4 = new Convocatoria();
        $c4->titulo = "Convocatoria 4";
        $c4->codigo = "2005";
        $c4->semestre = "1";
        $c4->gestion = "2019";
        $c4->archivo = 'imagenes/daniel.png';
        $c4->save();

        $ge1 = new GrupoEmpresa();
        $ge1->nombreCorto = "Sumajsoft";
        $ge1->nombreLargo = "Sumajsoft S.R.L.";
        $ge1->fecha = "10-10-2020";
        $ge1->tipoSociedad = "Sociedad Anonima";
        $ge1->save();
    }
}
