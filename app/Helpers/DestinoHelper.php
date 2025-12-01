<?php

if (!function_exists('modeloDestino')) {
    function modeloDestino($tipo)
    {
        return match ($tipo) {
            'deposito' => ['model' => \App\Models\Deposito::class, 'campo' => 'nombre'],
            'obra'     => ['model' => \App\Models\Obra::class,     'campo' => 'nombre'],
            'vehiculo' => ['model' => \App\Models\Vehiculo::class, 'campo' => 'patente'], // <-- CAMPO A USAR
            'equipo'   => ['model' => \App\Models\Equipo::class,   'campo' => 'nombre'],
            default    => null
        };
    }
}
