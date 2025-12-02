<?php

if (!function_exists('modeloDestinoCombustible')) {
    function modeloDestinoCombustible($tipo)   
    {
        return match ($tipo) {
            'vehiculo' => ['model' => \App\Models\Vehiculo::class, 'campo' => 'patente'], // <-- CAMPO A USAR
            'destino' => ['model' => \App\Models\Destino::class,   'campo' => 'nombre'],  
            'equipo'   => ['model' => \App\Models\Equipo::class,   'campo' => 'nombre'],
            default    => null
        };
    }
} 
