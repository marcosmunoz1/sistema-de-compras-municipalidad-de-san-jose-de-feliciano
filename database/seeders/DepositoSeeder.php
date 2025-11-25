<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deposito;

class DepositoSeeder extends Seeder
{
    public function run()
    {
        $datos = [
            [
                'nombre' => 'Corralón Municipal',
                'descripcion' => 'Depósito para materiales de construcción y mantenimiento urbano.',
            ],
            [
                'nombre' => 'Proveedor',
                'descripcion' => 'Deposito en los proveedores',
            ],
        ];

        foreach ($datos as $d) {
            Deposito::create($d);
        }
    }
}
