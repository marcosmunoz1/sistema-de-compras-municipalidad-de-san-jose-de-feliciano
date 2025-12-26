<?php

namespace App\Models;

use App\Traits\Catalogable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Vehiculo extends Model
{
    use HasFactory, SoftDeletes, Catalogable, LogsActivity;
    protected $table = 'vehiculos';

    protected $fillable = [ 
        'area_id',
        'catalogacion',  
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
        'area_id',
        'catalogacion',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_vehiculo')
                    ->withPivot('cantidad_asignada', 'detalle_compra_id','stock')
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
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['tipo', 'patente', 'marca', 'modelo', 'anio', 'color', 'chasis', 'motor', 'tipo_combustible_id', 'estado', 'area_id'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Vehiculo {$eventName}");
    }
}
