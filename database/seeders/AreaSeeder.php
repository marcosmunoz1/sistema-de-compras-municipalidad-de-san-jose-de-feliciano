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
                'prefijo'=> 'SG-',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nombre'=> 'Secretaria de Obras Publicas',
                'prefijo'=> 'OP-',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nombre'=> 'Secretaria de Desarrollo Humano',
                'prefijo'=> 'DH-',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nombre'=> 'Servicios Publicos',
                'prefijo'=> 'SP-',
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        ];
        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
