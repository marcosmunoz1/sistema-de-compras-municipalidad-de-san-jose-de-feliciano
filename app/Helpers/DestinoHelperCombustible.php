<?php

if (!function_exists('modeloDestinoCobustible')) {
    function modeloDestinoCobustible($tipo)  
    {
        return match ($tipo) {
            'vehiculo' => \App\Models\Vehiculo::class,
            'destino' => \App\Models\Destino::class, 
            'equipo'   => \App\Models\Equipo::class,
            default    => null
        };
    }
} 
