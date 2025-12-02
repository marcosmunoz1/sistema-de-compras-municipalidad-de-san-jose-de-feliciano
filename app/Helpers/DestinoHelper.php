<?php

if (!function_exists('modeloDestino')) { 
    function modeloDestino($tipo)
    {
        return match ($tipo) {
            'deposito' => ['model' => \App\Models\Deposito::class, 'campo' => 'cantidad'],
            'obra'     => ['model' => \App\Models\Obra::class,     'campo' => 'cantidad_asignada'],
            'vehiculo' => ['model' => \App\Models\Vehiculo::class, 'campo' => 'cantidad'], // ✔ pivote correcto
            'equipo'   => ['model' => \App\Models\Equipo::class,   'campo' => 'cantidad'], // cuando lo agregues
            default    => null
        }; 
    }
}

