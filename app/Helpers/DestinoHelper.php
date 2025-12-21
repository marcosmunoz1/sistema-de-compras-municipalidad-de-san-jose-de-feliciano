<?php

if (!function_exists('modeloDestino')) { 
    function modeloDestino($tipo)
    {
        // Normalizar el tipo (si viene "App\Models\Deposito" extrae "deposito")
        if (str_contains($tipo, '\\')) {
            $tipo = strtolower(class_basename($tipo)); 
        } else {
            $tipo = strtolower($tipo);
        }

        return match ($tipo) {
            'deposito' => [
                'model' => \App\Models\Deposito::class,
                'campo' => 'cantidad_asignada',
                'table' => 'deposito_producto' // ✅ Agregado
            ],

            'obra' => [
                'model' => \App\Models\Obra::class,
                'campo' => 'cantidad_asignada',
                'table' => 'obra_producto' // ✅ Agregado
            ],

            'vehiculo' => [
                'model' => \App\Models\Vehiculo::class,
                'campo' => 'cantidad_asignada',
                'table' => 'producto_vehiculo' // ✅ Agregado
            ],

            'equipo' => [
                'model' => \App\Models\Equipo::class,
                'campo' => 'cantidad_asignada',
                'table' => 'equipo_producto' // ✅ Agregado (ajusta el nombre si es diferente)
            ],

            'destino' => [
                'model' => \App\Models\Destino::class,
                'campo' => 'cantidad_asignada',
                'table' => 'destino_producto' // ✅ Agregado (ajusta el nombre si es diferente)
            ],

            default => null
        };
    }
}


