<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VehiculoSeeder extends Seeder
{
    public function run(): void
    {
        // Datos del vehículo:
        // patente, tipo, marca, modelo, tipo_combustible_id
        $vehiculos = [
            ['AF941-KX', 'CAMION', 'VOLKSWAGEN', '17280', 3],
            ['RYG754', 'CAMION', 'MERCEDES BENZ', '16/20', 3],
            ['NIS-698', 'CAMION', 'IVECO', 'ATTACK', 3],
            ['NIJ-647', 'CAMION', 'IVECO', 'ATTACK', 3],
            ['GNA-367', 'CAMION', 'FORD', 'CARGO', 3],
            ['GON-352', 'CAMION', 'FORD', 'CARGO', 3],
            ['AC-869XQ', 'CAMION', 'IVECO', 'CURSOR', 3],
            ['AA-976-QY', 'CAMION', 'IVECO', 'ATTAK', 3],
            ['VQU-386', 'CAMIONETA', 'FORD', 'F100', 1],
            ['VJN-986', 'CAMIONETA', 'FORD', 'F250', 1],
            ['JKA 205', 'CAMIONETA', 'FORD', 'RANGER', 1],
            ['WIE744', 'COLECTIVO', 'MERCEDES BENZ', '—', 3],
            ['ABO 648', 'COLECTIVO', 'SCANIA', '—', 3],
            ['JFM092', 'MINI BUS', 'RENAULT', 'MASTERS', 3],
            ['GYB 305', 'RETRO ESCAVADORA', 'JCB', '—', 3],
            ['FO 0995', 'TRACTOR', 'DEUTH', '6008', 3],
            ['EAT97', 'UTILITARIO', 'RENAULT', 'KANGO', 1],
            ['A65', 'CAMIONETA', 'VOLKSWAGEN', 'SAVEIRO', 1],
            ['FSK 295', 'CAMION', 'IVECO', 'CURSOR', 3],
            ['AB 375 US', 'CAMION', 'IVECO', 'DAILY', 3],
        ];

        foreach ($vehiculos as $v) {
            DB::table('vehiculos')->insert([    
                'area_id'             => 1,
                'catalogacion'        => Str::upper(Str::random(8)),
                'imagen'              => null,
                'tipo'                => $v[1],
                'patente'             => $v[0],
                'marca'               => $v[2],
                'modelo'              => $v[3],
                'anio'                => rand(1998, 2022),
                'color'               => 'Blanco',
                'chasis'              => Str::upper(Str::random(12)),
                'motor'               => Str::upper(Str::random(10)),
                'estado'              => true,  
                'deleted_at'          => null,
                'created_at'          => now(),
                'updated_at'          => now(),
                'tipo_combustible_id' => $v[4], 
            ]);
        }
    }
}