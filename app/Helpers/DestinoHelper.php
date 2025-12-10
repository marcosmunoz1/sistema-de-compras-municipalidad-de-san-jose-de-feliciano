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
                'campo' => 'cantidad'
            ],

            'obra' => [
                'model' => \App\Models\Obra::class,
                'campo' => 'cantidad_asignada'
            ],

            'vehiculo' => [
                'model' => \App\Models\Vehiculo::class,
                'campo' => 'cantidad'
            ],

            'equipo' => [
                'model' => \App\Models\Equipo::class,
                'campo' => 'cantidad'
            ],

            'destino' => [
                'model' => \App\Models\Destino::class,
                'campo' => 'cantidad'
            ],

            default => null
        };
    }
}


