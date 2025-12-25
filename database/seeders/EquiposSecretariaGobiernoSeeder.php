<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Equipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquiposSecretariaGobiernoSeeder extends Seeder
{
    public function run(): void
    {
        $area = Area::where('prefijo_catalogacion', 'SG-')->first();

        $equipos = [
            [
                'catalogacion' => 'SG-005',
                'equipamiento' => 'MOTOSIERRA C362',
                'marca' => 'STHIL',
                'descripcion' => '362 CILINDRADAS',
            ],
            [
                'catalogacion' => 'SG-006',
                'equipamiento' => 'MOTOSIERRA C170',
                'marca' => 'STHIL',
                'descripcion' => '170 CILINDRADAS',
            ],
            [
                'catalogacion' => 'SG-007',
                'equipamiento' => 'MOTOSIERRA C250',
                'marca' => 'STHIL',
                'descripcion' => '250 CILINDRADAS',
            ],
            [
                'catalogacion' => 'SG-008',
                'equipamiento' => 'MOTOSIERRA DE ALTURA C50',
                'marca' => 'STHIL',
                'descripcion' => '50 CILINDRADAS',
            ],
            [
                'catalogacion' => 'SG-009',
                'equipamiento' => 'MOTOCULTIVADOR 18"',
                'marca' => 'MTD GOLD',
                'descripcion' => 'N/A',
            ],
            [
                'catalogacion' => 'SG-010',
                'equipamiento' => 'MOTOGUADAÑA C280',
                'marca' => 'STHIL',
                'descripcion' => '280 CILINDRDAS',
            ],
            [
                'catalogacion' => 'SG-011',
                'equipamiento' => 'MOTOSIERRA',
                'marca' => 'MARCA CHINA',
                'descripcion' => '180 CILINDRADAS',
            ],
        ];

        foreach ($equipos as $eq) {
            Equipo::create([
                'equipamiento' => $eq['equipamiento'],
                'marca'        => $eq['marca'],
                'descripcion'  => $eq['descripcion'],
                'catalogacion' => $eq['catalogacion'],
                'area_id'      => $area->id,
                'estado'       => true,
            ]);
        }
    }
}

