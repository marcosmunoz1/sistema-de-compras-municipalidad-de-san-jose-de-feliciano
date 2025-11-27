<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    public function run()
    {
        $proveedores = [
            [
                'localidad' => 'Resistencia',
                'provincia' => 'Chaco',
                'pais' => 'Argentina',
                'empresa' => 'Comercial Norte S.A.',
                'nombre' => 'Juan Pérez',
                'razon_social' => 'Comercial Norte S.A.',
                'cuit' => '30-71234567-1',
                'telefono' => '0362-4455667',
                'celular' => '3624567890',
                'email' => 'contacto@comercialnorte.com',
                'codigo_postal' => '3500',
                'direccion' => 'Av. Sarmiento 1450',
                'observaciones' => 'Proveedor de insumos generales.',
            ],
            [
                'localidad' => 'Corrientes',
                'provincia' => 'Corrientes',
                'pais' => 'Argentina',
                'empresa' => 'Equipos del Litoral',
                'nombre' => 'María Gómez',
                'razon_social' => 'Equipos del Litoral SRL',
                'cuit' => '33-25478961-9',
                'telefono' => '0379-4223344',
                'celular' => '3794876543',
                'email' => 'ventas@equiposlitoral.com',
                'codigo_postal' => '3400',
                'direccion' => 'Belgrano 980',
                'observaciones' => 'Venta de maquinarias y repuestos.',
            ],
            [
                'localidad' => 'Posadas',
                'provincia' => 'Misiones',
                'pais' => 'Argentina',
                'empresa' => 'TecnoHerramientas',
                'nombre' => 'Carlos Duarte',
                'razon_social' => 'TecnoHerramientas S.R.L.',
                'cuit' => '30-98765432-5',
                'telefono' => null,
                'celular' => '3765123456',
                'email' => 'info@tecnoherramientas.com',
                'codigo_postal' => '3300',
                'direccion' => 'San Martín 2200',
                'observaciones' => 'Especialistas en herramientas industriales.',
            ],
            [
                'localidad' => 'Formosa',
                'provincia' => 'Formosa',
                'pais' => 'Argentina',
                'empresa' => 'Materiales Formosa',
                'nombre' => 'Ana López',
                'razon_social' => 'Materiales Formosa SA',
                'cuit' => '33-12345678-4',
                'telefono' => '0370-4432100',
                'celular' => '3704987765',
                'email' => 'contacto@materialesformosa.com',
                'codigo_postal' => '3600',
                'direccion' => 'Av. Gutnisky 450',
                'observaciones' => 'Insumos de construcción.',
            ],
            [
                'localidad' => 'Santa Fe',
                'provincia' => 'Santa Fe',
                'pais' => 'Argentina',
                'empresa' => 'Provecol S.A.',
                'nombre' => 'Roberto Maldonado',
                'razon_social' => 'Provecol S.A.',
                'cuit' => '30-44556677-8',
                'telefono' => '0342-4789001',
                'celular' => '3425123344',
                'email' => 'rmaldonado@provecol.com',
                'codigo_postal' => '3000',
                'direccion' => 'Bv. Pellegrini 2030',
                'observaciones' => 'Proveedor nacional de equipamiento y mantenimiento.',
            ],
        ];

        foreach ($proveedores as $prov) {
            Proveedor::create($prov);
        }
    }
}
