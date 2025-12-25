<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'nombre'=> 'Secretaria de Gobierno',
                'prefijo_catalogacion'=> 'SG-',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nombre'=> 'Secretaria de Obras Publicas',
                'prefijo_catalogacion'=> 'OP-',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nombre'=> 'Secretaria de Desarrollo Humano',
                'prefijo_catalogacion'=> 'DH-',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nombre'=> 'Servicios Publicos',
                'prefijo_catalogacion'=> 'SP-',
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        ];
        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
