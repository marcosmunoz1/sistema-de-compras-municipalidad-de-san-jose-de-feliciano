<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model 
{
    use HasFactory, SoftDeletes;
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

    public function obras()
    {
        return $this->belongsToMany(Obra::class, 'obra_producto')
            ->withPivot('cantidad_asignada')
            ->withTimestamps();
    }
    public function vehiculos()
    {
        return $this->belongsToMany(Vehiculo::class, 'producto_vehiculo')
                    ->withPivot('cantidad')
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
   

    
}
