<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Vehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiculosServiciosPublicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = Area::where('prefijo_catalogacion', 'SP-')->first();

        $vehiculos = [
            [
                'catalogacion' => 'SP-001',
                'tipo' => 'CAMIONETA',
                'marca' => 'CHEVROLET',
                'modelo' => 'S10',
                'patente' => 'AB 375 US',
                'imagen' => null,
                'anio' => null,
                'color' => null,
                'motor' => null,
                'chasis' => null,
                'tipo_combustible_id' => 1,
            ],
            [
                'catalogacion' => 'SP-002',
                'tipo' => 'CAMIONETA',
                'marca' => 'FORD',
                'modelo' => 'F100',
                'patente' => 'VQU-386',
                'imagen' => null,
                'anio' => null,
                'color' => null,
                'motor' => null,
                'chasis' => null,
                'tipo_combustible_id' => 1,
            ],
            [
                'catalogacion' => 'SP-003',
                'tipo' => 'CAMIONETA',
                'marca' => 'FORD',
                'modelo' => 'F250',
                'patente' => 'VJN-986',
                'imagen' => null,
                'anio' => null,
                'color' => null,
                'motor' => null,
                'chasis' => null,
                'tipo_combustible_id' => 1,
            ],
        ];

        foreach ($vehiculos as $vh) {
            Vehiculo::create([
                'catalogacion' => $vh['catalogacion'],
                'tipo'         => $vh['tipo'],
                'marca'        => $vh['marca'],
                'modelo'       => $vh['modelo'],
                'patente'      => $vh['patente'],
                'imagen'      => $vh['imagen'],
                'anio'        => $vh['anio'],
                'color'       => $vh['color'],
                'motor'       => $vh['motor'],
                'chasis'      => $vh['chasis'],
                'area_id'      => $area->id,
                'tipo_combustible_id' => $vh['tipo_combustible_id'],
                'estado'       => true,
            ]);
        }
    }
}
