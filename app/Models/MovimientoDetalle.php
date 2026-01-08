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
        'detalle_compra_id',
    ];

    public function movimiento()
    {
        return $this->belongsTo(Movimiento::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // En app/Models/MovimientoDetalle.php

    public function detalle_compra()
    {
        return $this->belongsTo(Detalle_compra::class, 'detalle_compra_id');
    }
}
