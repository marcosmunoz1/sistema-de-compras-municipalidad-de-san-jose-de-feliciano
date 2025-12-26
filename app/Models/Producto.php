<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Producto extends Model 
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'productos'; 
    protected $fillable = [
      'nombre',
      'descripcion',
      'unidad', 
      'estado' 
    ];
    
    protected $attributes = [
      'estado' => true,
    ];

   public function detalle_compras()
  {
      return $this->hasMany(Detalle_Compra::class);
  }

 
   public function obras()
  {
      return $this->belongsToMany(Obra::class)
          ->using(ObraProducto::class)
          ->withPivot(['cantidad_asignada', 'detalle_compra_id'])
          ->withTimestamps();
  }

    public function vehiculos()
    {
        return $this->belongsToMany(Vehiculo::class, 'producto_vehiculo')
            ->withPivot('cantidad_asignada', 'detalle_compra_id')
            ->withTimestamps();
    }

    public function depositos()
    {
        return $this->belongsToMany(Deposito::class, 'deposito_producto')
                    ->using(DepositoProducto::class)
                    ->withPivot(['cantidad_asignada', 'detalle_compra_id'])
                    ->withTimestamps();
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class)
            ->using(EquipoProducto::class)
            ->withPivot(['cantidad_asignada', 'detalle_compra_id'])
            ->withTimestamps();
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function categoria()
    {
      return $this->belongsTo(Categoria::class);
    } 

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'descripcion', 'unidad', 'estado'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Producto {$eventName}");
    }
   

    
}
