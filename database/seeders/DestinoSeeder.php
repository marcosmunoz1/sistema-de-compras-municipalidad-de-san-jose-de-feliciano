<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinoSeeder extends Seeder
{
    public function run(): void
    {
        $destinos = [

            // ───────────────────────────────────────────────
            // ORGANISMOS PÚBLICOS
            // ───────────────────────────────────────────────
            [
                'nombre' => 'Policía Local',
                'tipo' => 'organismo_publico',
                'descripcion' => 'Acuerdo policial - subsidio de combustible',
            ],
            [
                'nombre' => 'Municipalidad de Villa María',
                'tipo' => 'organismo_publico',
                'descripcion' => 'Área de obras públicas',
            ],
            [
                'nombre' => 'Bomberos Voluntarios',
                'tipo' => 'organismo_publico',
                'descripcion' => 'Apoyo operativo y emergencias',
            ],

            // ───────────────────────────────────────────────
            // PERSONAS
            // ───────────────────────────────────────────────
            [
                'nombre' => 'Juan Pérez',
                'tipo' => 'persona',
                'descripcion' => 'Empleado municipal - uso asignado',
            ],
            [
                'nombre' => 'María Gómez',
                'tipo' => 'persona',
                'descripcion' => 'Solicitud de movilidad por tareas de campo',
            ],

            // ───────────────────────────────────────────────
            // POLICÍA
            // (si definís "policia" como tipo separado)
            // ───────────────────────────────────────────────
            [
                'nombre' => 'Comisaría Seccional 2°',
                'tipo' => 'policia',
                'descripcion' => 'Patrullaje preventivo',
            ],

            // ───────────────────────────────────────────────
            // EMPRESAS
            // ───────────────────────────────────────────────
            [
                'nombre' => 'Walter Motos',
                'tipo' => 'empresa',
                'descripcion' => 'Servicio mecánico y mantenimiento',
            ],
            [
                'nombre' => 'Hidromaq S.A.',
                'tipo' => 'empresa',
                'descripcion' => 'Proveedor de repuestos y lubricantes',
            ],

            // ───────────────────────────────────────────────
            // INSTITUCIONES
            // ───────────────────────────────────────────────
            [
                'nombre' => 'Hospital Regional',
                'tipo' => 'institucion',
                'descripcion' => 'Movilidad para insumos y emergencias',
            ],
            [
                'nombre' => 'Escuela Técnica N° 320',
                'tipo' => 'institucion',
                'descripcion' => 'Servicios educativos y apoyo técnico',
            ],
        ];

        DB::table('destinos')->insert($destinos);
    }
} 