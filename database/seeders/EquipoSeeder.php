<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;

class EquipoSeeder extends Seeder
{
    public function run()
    {
        $equipos = [
            [
                'equipamiento' => 'Motosierra Stihl', 
                'marca' => 'Stihl',
                'descripcion' => 'motosierra', 
                'area_id' => '1',
                'catalogacion' => 'STH-00123',
                'estado' => true,
            ],
            [
                'equipamiento' => 'Compresor Industrial',
                'marca' => 'Gamma',
                'descripcion' => 'GA-50',
                'area_id' => '2',
                'catalogacion' => 'CMP-45876',
                'estado' => true,
            ],
            [
                'equipamiento' => 'Hidrolavadora',
                'marca' => 'Karcher',
                'descripcion' => 'K3',
                'area_id' => '1',
                'catalogacion' => 'HDR-78211',
                'estado' => true,
            ],
            [
                'equipamiento' => 'Taladro Percutor',
                'marca' => 'Bosch',
                'descripcion' => 'GSR 120',
                'area_id' => '2',
                'catalogacion' => 'TLR-99831',
                'estado' => false,
            ],
            [ 
                'equipamiento' => 'Soldadora Eléctrica',
                'marca' => 'Yelmo',
                'descripcion' => '200A', 
                'area_id' => '1',
                'catalogacion' => 'SLD-66324',
                'estado' => false,
            ],
        ];

        foreach ($equipos as $equipo) {
            Equipo::create($equipo);
        }
    }
} 