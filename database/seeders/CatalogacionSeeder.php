<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;
use App\Models\Vehiculo;
use App\Models\Catalogacion;

class CatalogacionSeeder extends Seeder
{
    public function run(): void
    {
        // === EQUIPOS ===
        $equipos = Equipo::all();

        foreach ($equipos as $equipo) {
            Catalogacion::create([
                'codigo'  => $equipo->catalogacion,
                'area_id' => $equipo->area_id,
                'tipo'    => 'equipo',
                'item_id' => $equipo->id,
            ]);
        }

        // === VEHICULOS ===
        $vehiculos = Vehiculo::all();

        foreach ($vehiculos as $vehiculo) {
            Catalogacion::create([
                'codigo'  => $vehiculo->catalogacion,
                'area_id' => $vehiculo->area_id,
                'tipo'    => 'vehiculo',
                'item_id' => $vehiculo->id,
            ]);
        }
    }
}
