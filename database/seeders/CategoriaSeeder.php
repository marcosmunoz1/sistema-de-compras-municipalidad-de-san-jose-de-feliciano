<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            [
                'nombre' => 'Ferretería',
                'slug' => Str::slug('Ferretería'),
                'descripcion' => 'Herramientas, insumos y artículos generales de ferretería.',
            ],
            [
                'nombre' => 'Repuestos Automotor',
                'slug' => Str::slug('Repuestos Automotor'),
                'descripcion' => 'Repuestos y accesorios para autos, camionetas y motos.',
            ],
            [
                'nombre' => 'Lubricantes y Aceites',
                'slug' => Str::slug('Lubricantes y Aceites'),
                'descripcion' => 'Aceites, grasas y lubricantes para motores.',
            ],
            [
                'nombre' => 'Equipos y Maquinaria',
                'slug' => Str::slug('Equipos y Maquinaria'),
                'descripcion' => 'Equipos eléctricos, herramientas y maquinaria profesional.',
            ],
            [
                'nombre' => 'Electricidad',
                'slug' => Str::slug('Electricidad'),
                'descripcion' => 'Cables, artefactos e insumos eléctricos.',
            ],
            [
                'nombre' => 'Construcción',
                'slug' => Str::slug('Construcción'),
                'descripcion' => 'Materiales y artículos para obra.',
            ],
            [
                'nombre' => 'Pintura',
                'slug' => Str::slug('Pintura'),
                'descripcion' => 'Pinturas, aerosoles, pinceles y accesorios.',
            ],
            [
                'nombre' => 'Seguridad Industrial',
                'slug' => Str::slug('Seguridad Industrial'),
                'descripcion' => 'Elementos de protección personal y seguridad laboral.',
            ],
        ];

        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }
    }
}
