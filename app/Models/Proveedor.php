<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
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
