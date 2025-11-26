<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    protected $fillable = ['nombre','descripcion'];
    

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'deposito_producto')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }


    public function movimientosComoOrigen()
    {
        return $this->morphMany(Movimiento::class, 'origen', 'origen_tipo', 'origen_id');
    }

    public function movimientosComoDestino()
    {
        return $this->morphMany(Movimiento::class, 'destino', 'destino_tipo', 'destino_id');
    }
}
