<?php

namespace Database\Factories; 

use Illuminate\Database\Eloquent\Factories\Factory;

class TipoCombustibleFactory extends Factory 
{
    public function definition()
    {
        return [
                'nombre' => $this->faker->randomElement([
                'Nafta Súper',
                'Nafta Premium',
                'Diesel',
                'Diesel Premium',
                'GNC'
            ]),
            'valor' => $this->faker->randomFloat(2, 500, 2000), // precio aproximado
            'descripcion' => $this->faker->sentence(10),
        ];
    }
}
