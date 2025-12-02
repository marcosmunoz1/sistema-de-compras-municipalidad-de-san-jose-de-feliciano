<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_compra extends Model
{
    protected $table = 'detalle_compras';
    protected $fillable = [
        'compra_id',
        'producto_id',
        'precio',
        'subtotal',
        'cantidad',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function vehiculosAsignados()
    {
        return $this->hasMany(ProductoVehiculo::class, 'detalle_compra_id');
    }

}
 