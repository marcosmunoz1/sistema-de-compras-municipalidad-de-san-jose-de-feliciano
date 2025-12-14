<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductoVehiculo extends Pivot
{
    protected $table = 'producto_vehiculo';

    protected $fillable = [
        'producto_id',
        'vehiculo_id',
        'cantidad_asignada',
        'stock',
        'detalle_compra_id',
    ];

    public function detalleCompra()
    {
        return $this->belongsTo(Detalle_Compra::class, 'detalle_compra_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function getPrecioOriginalAttribute()
    {
        return $this->detalleCompra?->precio ?? 0;
    }

    public function getSubtotalAttribute()
    {
        return $this->getPrecioOriginalAttribute() * $this->cantidad;
    }
}

