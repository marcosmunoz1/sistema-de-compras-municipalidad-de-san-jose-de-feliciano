<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
   protected $table = 'equipos';
    protected $fillable = [
    'nombre',
    'tipo_equipo',
    'marca',
    'modelo',
    'numero_serie',
    'estado'
    ];
     protected $attributes = [
      'estado' => true,
    ]; 

    // Un equipo puede recibir movimientos como destino u origen
    public function movimientosOrigen()
    {
    return $this->morphMany(Movimiento::class, 'origen'); 
    }


    public function movimientosDestino()
    {
    return $this->morphMany(Movimiento::class, 'destino');
    }
}
