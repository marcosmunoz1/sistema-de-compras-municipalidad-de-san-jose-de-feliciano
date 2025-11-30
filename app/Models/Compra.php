<?php

namespace App\Models;
use App\Models\Proveedor;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{   
    use SoftDeletes; 
    protected $table = 'compras';  
    protected $fillable = [
        'proveedor_id',
        'empleado_id',
        'destino_tipo',
        'destino_id',
        'area_solicitante',
        'nr_orden',
        'sub_cuenta',
        'fecha_orden',
        'estado_compra',
        'asunto_obra_automotor',
        'total',
        'observacion',
        'total' 
    ];
    protected $attributes = [
    'estado' => true,
    ];

     public function destino()
    {
        return $this->morphTo(__FUNCTION__, 'destino_tipo', 'destino_id');
    }
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
