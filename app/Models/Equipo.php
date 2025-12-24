<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Catalogable;


class Equipo extends Model
{
  use SoftDeletes, Catalogable;
   protected $table = 'equipos';
    protected $fillable = [
    'equipamiento',
    'marca',
    'descripcion',
    'area_id',
    'estado',
    'catalogacion',
    ];
     protected $attributes = [
      'estado' => true,
    ]; 

    public function productos()
    {
        return $this->belongsToMany(Producto::class)
            ->using(EquipoProducto::class)
            ->withPivot(['id','cantidad_asignada',
                        'detalle_compra_id',
                        'stock'])
            ->withTimestamps();
    }

    // Un equipo puede recibir movimientos como destino u origen
    public function movimientosOrigen()
    {
    return $this->morphMany(Movimiento::class, 'origen'); 
    }

    public function movimientosDestino()
    {
    return $this->morphMany(Movimiento::class, 'destino');
    }
    
    // Relación con Area
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
