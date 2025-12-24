<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EquipoProducto extends Pivot
{
    protected $table = 'equipo_producto';

    protected $fillable = [
        'equipo_id',
        'producto_id',
        'cantidad_asignada', // o "cantidad", según cómo lo llamaste
        'stock',
        'detalle_compra_id',
    ];

    // Relación con el detalle de compra original (para obtener precio/subtotal)
    public function detalleCompra()
    {
        return $this->belongsTo(Detalle_Compra::class, 'detalle_compra_id');
    }

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con el equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    // Precio original al momento de la compra
    public function getPrecioOriginalAttribute()
    {
        return $this->detalleCompra?->precio ?? 0;
    }

    // Subtotal calculado en base al precio original
    public function getSubtotalAttribute()
    {
        return $this->getPrecioOriginalAttribute() * ($this->cantidad_asignada ?? $this->cantidad);
    }
}
