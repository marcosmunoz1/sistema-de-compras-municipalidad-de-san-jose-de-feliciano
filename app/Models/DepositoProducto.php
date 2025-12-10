<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DepositoProducto extends Pivot
{
    protected $table = 'deposito_producto'; // o 'deposito_productos' según tu tabla

    protected $fillable = [
        'deposito_id',
        'producto_id',
        'cantidad_asignada',
        'stock',
        'detalle_compra_id',
    ];

    // Relación al detalle de compra (para obtener precio y subtotal original)
    public function detalleCompra()
    {
        return $this->belongsTo(Detalle_Compra::class, 'detalle_compra_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function deposito()
    {
        return $this->belongsTo(Deposito::class);
    }

    // Precio original de la compra
    public function getPrecioOriginalAttribute()
    {
        return $this->detalleCompra?->precio ?? 0;
    }

    // Subtotal: precio original * cantidad (usa cantidad del pivote)
    public function getSubtotalAttribute()
    {
        return ($this->getPrecioOriginalAttribute() * ($this->cantidad ?? 0));
    }
}
