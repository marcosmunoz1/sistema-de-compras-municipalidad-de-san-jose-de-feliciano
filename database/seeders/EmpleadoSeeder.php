<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    public function run()
    {
        $empleados = [
            [
                'nombre' => 'Juan Pérez',
                'dni' => '30123456',
                'celular' => '3512345678',
                'direccion' => 'Calle San Martín 123',
                'email' => 'juan.perez@example.com',
                'puesto' => 'Administrativo',
                'area' => 'Administración',
                'observaciones' => 'Encargado de documentación y control interno.',
            ],
            [
                'nombre' => 'María Gómez',
                'dni' => '28987654',
                'celular' => '3519876543',
                'direccion' => 'Av. Colón 456',
                'email' => 'maria.gomez@example.com',
                'puesto' => 'Responsable de Compras',
                'area' => 'Compras',
                'observaciones' => 'Gestiona proveedores y órdenes de compra.',
            ],
            [
                'nombre' => 'Carlos López',
                'dni' => '31222333',
                'celular' => '3523456789',
                'direccion' => 'B° Jardín, Córdoba',
                'email' => 'carlos.lopez@example.com',
                'puesto' => 'Mecánico',
                'area' => 'Taller',
                'observaciones' => 'Especializado en mantenimiento preventivo.',
            ],
            [
                'nombre' => 'Sofía Ramírez',
                'dni' => '29555444',
                'celular' => '3516677889',
                'direccion' => 'Calle Belgrano 789',
                'email' => 'sofia.ramirez@example.com',
                'puesto' => 'Chofer',
                'area' => 'Logística',
                'observaciones' => 'Opera vehículos de reparto.',
            ],
            [
                'nombre' => 'Lucas Fernández',
                'dni' => '27888999',
                'celular' => '3512233445',
                'direccion' => 'Av. O’Higgins 1500',
                'email' => 'lucas.fernandez@example.com',
                'puesto' => 'Depósito',
                'area' => 'Almacén',
                'observaciones' => 'Control de stock y gestión de inventarios.',
            ],
        ];

        foreach ($empleados as $emp) {
            Empleado::create($emp);
        }
    }
}