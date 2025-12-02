<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obra extends Model
{
    use SoftDeletes;

    // Campos que se pueden cargar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'barrio',
        'ciudad',
        'responsable',
        'telefono_responsable',
        'fecha_inicio',
        'fecha_estimada_fin',
        'fecha_fin',
        'estado_obra',
        'presupuesto',
        'monto_ejecutado',
        'observaciones',
        'estado',
    ];

    // Cast automáticos para facilitar el uso en controladores y vistas
    protected $casts = [
        'estado' => 'boolean',
        'fecha_inicio' => 'date',
        'fecha_estimada_fin' => 'date',
        'fecha_fin' => 'date',
        'presupuesto' => 'decimal:2',
        'monto_ejecutado' => 'decimal:2',
    ];
    public function productos()
    {
        return $this->belongsToMany(Producto::class)
            ->using(ObraProducto::class)
            ->withPivot(['cantidad_asignada', 'detalle_compra_id'])
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
