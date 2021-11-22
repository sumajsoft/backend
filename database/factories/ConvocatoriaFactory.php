<?php

namespace Database\Factories;

use App\Models\Convocatoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConvocatoriaFactory extends Factory
{

    protected $model = Convocatoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        return [  
            'titulo' => $this->faker->sentence(3),
            'codigo' => $this->faker->sentence(1),   
            'semestre' => $this->faker->randomElement(['1','2']),
            'gestion' => $this->faker->year(2030)
            // 'fechaPublicacion'
        ];
    }
}