<?php

namespace Database\Seeders;
use App\Models\GrupoEmpresa;
use Illuminate\Database\Seeder;

class GrupoEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrupoEmpresa::factory(10)->create();

        /*$ge = new GrupoEmpresa();

        $ge->nombreCorto="asdfg";
        $ge->nombreLargo="asdfg";
        $ge->fechaCreacion="asdfg";
        $ge->tipoSociedad="asdfg";
        $ge->direccion="asdfg";
        $ge->email="asdfg";
        $ge->telefono="asdfg";
        $ge->nombreSocio1="asdfg";
        $ge->nombreSocio2="asdfg";
        $ge->nombreSocio3="asdfg";
        $ge->nombreSocio4="asdfg";
        $ge->nombreSocio5="asdfg";
        $ge->logoPath="asdfg";

        $ge->save();*/
    }
}
