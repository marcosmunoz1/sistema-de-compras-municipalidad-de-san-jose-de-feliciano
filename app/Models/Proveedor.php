<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Proveedor extends Model
{ 
    use HasFactory, SoftDeletes;   
    protected $table = 'proveedores';
    protected $fillable = [
        'localidad',
        'provincia',
        'pais',
        'nombre',
        'razon_social',
        'cuit',
        'telefono',
        'celular',
        'email',
        'codigo_postal',
        'direccion',
        'observaciones',
    ];
}
