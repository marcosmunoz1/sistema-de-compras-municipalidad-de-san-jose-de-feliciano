<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipo_combustibles;

class TipoCombustibleSeeder extends Seeder 
{
    public function run()
    {
        $datos = [
            [
                'nombre' => 'Nafta Súper',
                'valor' => 980.50,
                'descripcion' => 'Combustible indicado para uso general en vehículos nafteros.',
            ],
            [
                'nombre' => 'Nafta Premium',
                'valor' => 1120.75,
                'descripcion' => 'Combustible de alto octanaje para motores de mayor exigencia.',
            ],
            [
                'nombre' => 'Diesel',
                'valor' => 950.00,
                'descripcion' => 'Combustible estándar para vehículos diesel.',
            ],
            [
                'nombre' => 'Diesel Premium',
                'valor' => 1180.25,
                'descripcion' => 'Diesel mejorado para motores modernos y de alto rendimiento.',
            ],
            [
                'nombre' => 'GNC',
                'valor' => 430.90,
                'descripcion' => 'Gas Natural Comprimido para vehículos adaptados.',
            ],
        ];

        foreach ($datos as $d) {
            Tipo_combustibles::create($d); 
        }
    }
}