<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoDetalle extends Model
{
    protected $table = 'movimiento_detalles';

    protected $fillable = [
        'movimiento_id',
        'producto_id',
        'cantidad',
    ];

    public function movimiento()
    {
        return $this->belongsTo(Movimiento::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
