<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory, SoftDeletes; 
    protected $table = 'empleados'; 
    protected $fillable = [
      'nombre',
      'dni',
      'celular',
      'direccion',
      'email',
      'puesto',
      'area',
      'observaciones',
      'estado',
    ];

    protected $attributes = [
      'estado' => true,
    ];
    public function vehiculo()
    {
      return $this->belongsTo(Vehiculo::class);
    } 
}
