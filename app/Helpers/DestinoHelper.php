<?php

if (!function_exists('modeloDestino')) {
    function modeloDestino($tipo)
    {
        return match ($tipo) {
            'deposito' => \App\Models\Deposito::class,
            'obra'     => \App\Models\Obra::class,
            'vehiculo' => \App\Models\Vehiculo::class,
            'equipo'   => \App\Models\Equipo::class,
            default    => null
        };
    }
}
