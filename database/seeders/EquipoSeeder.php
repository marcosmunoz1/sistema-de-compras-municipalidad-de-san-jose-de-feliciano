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
                'nombre' => 'Motosierra Stihl',
                'tipo_equipo' => 'motosierra',
                'marca' => 'Stihl',
                'modelo' => 'MS 170',
                'numero_serie' => 'STH-00123',
                'estado_equipo' => 'activo',
                'estado' => true,
            ],
            [
                'nombre' => 'Compresor Industrial',
                'tipo_equipo' => 'compresor',
                'marca' => 'Gamma',
                'modelo' => 'GA-50',
                'numero_serie' => 'CMP-45876',
                'estado_equipo' => 'en_reparacion',
                'estado' => true,
            ],
            [
                'nombre' => 'Hidrolavadora',
                'tipo_equipo' => 'hidrolavadora',
                'marca' => 'Karcher',
                'modelo' => 'K3',
                'numero_serie' => 'HDR-78211',
                'estado_equipo' => 'activo',
                'estado' => true,
            ],
            [
                'nombre' => 'Taladro Percutor',
                'tipo_equipo' => 'taladro',
                'marca' => 'Bosch',
                'modelo' => 'GSR 120',
                'numero_serie' => 'TLR-99831',
                'estado_equipo' => 'inactivo',
                'estado' => false,
            ],
            [
                'nombre' => 'Soldadora Eléctrica',
                'tipo_equipo' => 'soldadora',
                'marca' => 'Yelmo',
                'modelo' => '200A',
                'numero_serie' => 'SLD-66324',
                'estado_equipo' => 'baja',
                'estado' => false,
            ],
        ];

        foreach ($equipos as $equipo) {
            Equipo::create($equipo);
        }
    }
}