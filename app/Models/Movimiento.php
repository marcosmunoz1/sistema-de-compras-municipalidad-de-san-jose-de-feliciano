<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'producto_id',
        'compra_id',
        'tipo',
        'origen_tipo',
        'origen_id',
        'destino_tipo',
        'destino_id',
        'cantidad',
        'fecha',
        'observacion'
    ];

    public function getOrigenLabelAttribute()
    {
        if (!$this->origen) return '---';

        return class_basename($this->origen) . ': ' . ($this->origen->nombre ?? 'Sin nombre');
    }

    public function getDestinoLabelAttribute()
    {
        if (!$this->destino) return '---';

        return class_basename($this->destino) . ': ' . ($this->destino->nombre ?? 'Sin nombre');
    }


    // Relación polimórfica con el origen
    public function origen()
    {
        return $this->morphTo(__FUNCTION__, 'origen_tipo', 'origen_id');
    }

    // Relación polimórfica con el destino
    public function destino()
    {
        return $this->morphTo(__FUNCTION__, 'destino_tipo', 'destino_id');
    }

    // Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
