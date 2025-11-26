<?php

namespace App\Models;
use App\Models\Proveedor;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{   
    protected $table = 'compras';  
    protected $fillable = [
        'proveedor_id',
        'empleado_id',
        'nr_orden',
        'fecha_orden',
        'estado_compra',
        'total',
    ];
    protected $attributes = [
    'estado' => true,
    ];


    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function detalle_compras()
    {
        return $this->hasMany(Detalle_Compra::class); 
    }
}
