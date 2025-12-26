<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Vehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiculosSecretariaDesarrolloHumanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = Area::where('prefijo_catalogacion', 'DH-')->first();

        $vehiculos = [
            [
                'catalogacion' => 'DH-001',
                'tipo' => 'CAMIONETA',
                'marca' => 'RENAULT',
                'modelo' => 'KANGOO 21.SD',
                'patente' => 'JSK295',
                'imagen' => null,
                'anio' => null,
                'color' => null,
                'motor' => null,
                'chasis' => null,
                'tipo_combustible_id' => 1,
            ],
            [
                'catalogacion' => 'DH-002',
                'tipo' => 'TRAFIC',
                'marca' => 'RENAULT',
                'modelo' => 'MASTER 2.5 DCI MINIBUS',
                'patente' => 'JFM029',
                'imagen' => null,
                'anio' => null,
                'color' => null,
                'motor' => null,
                'chasis' => null,
                'tipo_combustible_id' => 1,

            ],
            [
                'catalogacion' => 'DH-006',
                'tipo' => 'CAMIONETA',
                'marca' => 'RENAULT',
                'modelo' => 'DUSTER OROCH OUTSIDER 1.6',
                'patente' => 'AB601PX',
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
