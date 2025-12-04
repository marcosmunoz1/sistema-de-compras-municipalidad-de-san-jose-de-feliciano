<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'vehiculos';

    protected $fillable = [
        'imagen',
        'tipo',
        'patente',
        'marca',
        'modelo',
        'anio',
        'color',
        'chasis',
        'motor',
        'tipo_combustible_id',
        'estado', 
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_vehiculo')
                    ->withPivot('cantidad', 'detalle_compra_id')
                    ->using(ProductoVehiculo::class)
                    ->withTimestamps();
    }




    public function combustible()
    {
      return $this->hasMany(Combustible::class);
    }
    
    public function movimientosComoOrigen()
    {
        return $this->morphMany(Movimiento::class, 'origen', 'origen_tipo', 'origen_id');
    }

    public function movimientosComoDestino() 
    {
        return $this->morphMany(Movimiento::class, 'destino', 'destino_tipo', 'destino_id');
    }

    public function tipo_combustible()
    {
        return $this->belongsTo(Tipo_combustibles::class);  
    } 
}
