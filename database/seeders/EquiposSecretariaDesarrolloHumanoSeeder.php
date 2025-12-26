<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Equipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquiposSecretariaDesarrolloHumanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = Area::where('prefijo_catalogacion', 'DH-')->first();

        $equipos = [
            [
                'catalogacion' => 'DH-003',
                'equipamiento' => 'MOTOGUADAÑA',
                'marca' => 'STHIL',
                'descripcion' => '280 CILINDRADAS',
            ],
            [
                'catalogacion' => 'DH-004',
                'equipamiento' => 'MOTOGUADAÑA',
                'marca' => 'TMC',
                'descripcion' => '52 CILINDRADAS',
            ],
            [
                'catalogacion' => 'DH-005',
                'equipamiento' => 'CORTADORA DE CESPED DE ARRASTRE',
                'marca' => 'T675 NGP',
                'descripcion' => '200 CILINDRADAS',
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
