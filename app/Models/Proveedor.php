<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{    
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
