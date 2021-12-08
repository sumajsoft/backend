<?php

namespace Database\Factories;
use App\Models\GrupoEmpresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoEmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = GrupoEmpresa::class;

     
    public function definition()
    {
        return [
            'nombreCorto'=> $this->faker->sentence(),
            'nombreLargo'=> $this->faker->sentence(),
            'fechaCreacion'=> $this->faker->sentence(),
            'tipoSociedad'=> $this->faker->sentence(),
            'direccion'=> $this->faker->sentence(),
            'email'=> $this->faker->sentence(),
            'telefono'=> $this->faker->sentence(),
            'nombreSocio1'=> $this->faker->sentence(),
            'nombreSocio2'=> $this->faker->sentence(),
            'nombreSocio3'=> $this->faker->sentence(),
            'nombreSocio4'=> $this->faker->sentence(),
            'nombreSocio5'=> $this->faker->sentence(),
            'logoPath'=> $this->faker->sentence()
        ];
    }
}
