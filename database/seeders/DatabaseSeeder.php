<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deposito;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */ 
        $this->call(TipoCombustibleSeeder::class);
        $this->call(PermissionSeeder::class); 
        $this->call(DepositoSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(CategoriaSeeder::class); 
        $this->call(ProductoSeeder::class);
        $this->call(EmpleadoSeeder::class); 
        $this->call(DestinoSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(EquiposSecretariaGobiernoSeeder::class);
        $this->call(VehiculosSecretariaGobiernoSeeder::class);
        $this->call(VehiculosSecretariaObrasPublicasSeeder::class);
        $this->call(EquiposSecretariaDesarrolloHumanoSeeder::class);
        $this->call(VehiculosSecretariaDesarrolloHumanoSeeder::class);
        $this->call(VehiculosServiciosPublicosSeeder::class);
        $this->call(CatalogacionSeeder::class);
        Producto::factory()->count(1900)->create(); 
    }
}
