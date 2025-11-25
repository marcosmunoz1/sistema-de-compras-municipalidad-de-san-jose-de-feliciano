<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_combustibles extends Model 
{
  use HasFactory, SoftDeletes;
  protected $table = 'tipo_combustibles';
   protected $fillable = [
      'nombre',
      'valor',
      'descripcion'
    ];
    protected $attributes = [
      'estado' => true,
    ];
   

}
