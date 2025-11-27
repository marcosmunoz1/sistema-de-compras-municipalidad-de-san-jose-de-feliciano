<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        // Obtener IDs de categorías por SLUG
        $ferreteria       = Categoria::where('slug', 'ferreteria')->first()->id;
        $automotor        = Categoria::where('slug', 'repuestos-automotor')->first()->id;
        $lubricantes      = Categoria::where('slug', 'lubricantes-y-aceites')->first()->id;
        $equipos          = Categoria::where('slug', 'equipos-y-maquinaria')->first()->id;

        $productos = [
            // ---- FERRETERÍA ----
            [
                'categoria_id' => $ferreteria,
                'nombre' => 'Martillo de Uña',
                'descripcion' => 'Martillo de acero con mango de fibra reforzada.',
                'unidad' => 'unidad'
            ],
            [
                'categoria_id' => $ferreteria,
                'nombre' => 'Llave Francesa 12"',
                'descripcion' => 'Llave ajustable de acero templado de 12 pulgadas.',
                'unidad' => 'unidad'
            ],
            [
                'categoria_id' => $ferreteria,
                'nombre' => 'Tornillos Parker 4x30',
                'descripcion' => 'Caja de tornillos Parker 4x30 mm.',
                'unidad' => 'caja'
            ],

            // ---- AUTOMOTOR ----
            [
                'categoria_id' => $automotor,
                'nombre' => 'Batería 12V 70Ah AGM',
                'descripcion' => 'Batería automotriz de alta durabilidad libre de mantenimiento.',
                'unidad' => 'unidad'
            ],
            [
                'categoria_id' => $automotor,
                'nombre' => 'Filtro de Aceite Ford Ranger',
                'descripcion' => 'Filtro de aceite para motor diésel 3.2 / 2.2.',
                'unidad' => 'unidad'
            ],
            [
                'categoria_id' => $automotor,
                'nombre' => 'Pastillas de Freno Delanteras',
                'descripcion' => 'Juego de pastillas de freno reforzadas.',
                'unidad' => 'juego'
            ],

            // ---- LUBRICANTES ----
            [
                'categoria_id' => $lubricantes,
                'nombre' => 'Aceite 10W40 Semi-Sintético',
                'descripcion' => 'Aceite lubricante para motores nafteros y diésel.',
                'unidad' => 'litro'
            ],
            [
                'categoria_id' => $lubricantes,
                'nombre' => 'Aceite 5W30 Sintético',
                'descripcion' => 'Aceite sintético premium para motores modernos.',
                'unidad' => 'litro'
            ],
            [
                'categoria_id' => $lubricantes,
                'nombre' => 'Grasa Lubricante Multiuso',
                'descripcion' => 'Grasa para rodamientos, ejes y piezas mecánicas.',
                'unidad' => 'kg'
            ],

            // ---- EQUIPOS ----
            [
                'categoria_id' => $equipos,
                'nombre' => 'Taladro Percutor 600W',
                'descripcion' => 'Taladro con percusión y velocidad variable.',
                'unidad' => 'unidad'
            ],
            [
                'categoria_id' => $equipos,
                'nombre' => 'Amoladora Angular 850W',
                'descripcion' => 'Amoladora de 4 1/2 pulgadas de alta resistencia.',
                'unidad' => 'unidad'
            ],
            [
                'categoria_id' => $equipos,
                'nombre' => 'Compresor 50L 2HP',
                'descripcion' => 'Compresor monofásico ideal para herramientas neumáticas.',
                'unidad' => 'unidad'
            ],
        ];

        foreach ($productos as $p) {
            Producto::create($p);
        }
    }
}