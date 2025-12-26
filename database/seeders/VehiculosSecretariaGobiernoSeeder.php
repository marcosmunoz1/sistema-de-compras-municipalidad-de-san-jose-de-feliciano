<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Vehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiculosSecretariaGobiernoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = Area::where('prefijo_catalogacion', 'SG-')->first();

        $vehiculos = [
            [
                'catalogacion' => 'SG-001',
                'tipo' => 'CAMIONETA',
                'marca' => 'TOYOTA',
                'modelo' => 'HILUX',
                'patente' => 'EST 607',
                'imagen' => null,
                'anio' => null,
                'color' => null,
                'motor' => null,
                'chasis' => null,
                'tipo_combustible_id' => 1,
            ],
            [
                'catalogacion' => 'SG-002',
                'tipo' => 'CAMIONETA',
                'marca' => 'FORD',
                'modelo' => 'RANGER 2.2',
                'patente' => 'AF 597 ES',
                'imagen' => null,
                'anio' => null,
                'color' => null,
                'motor' => null,
                'chasis' => null,
                'tipo_combustible_id' => 1,
            ],
            [
                'catalogacion' => 'SG-003',
                'tipo' => 'Tractor',
                'marca' => 'MASSEY FERGUSON',
                'modelo' => '1195',
                'patente' => 'N/A',
                'imagen' => null,
                'anio' => null,
                'color' => null,
                'motor' => null,
                'chasis' => null,
                'tipo_combustible_id' => 1,
            ],
            [
                'catalogacion' => 'SG-004',
                'tipo' => 'Camión',
                'marca' => 'FOTON',
                'modelo' => 'AUMARK',
                'patente' => 'AF 308 VI',
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
