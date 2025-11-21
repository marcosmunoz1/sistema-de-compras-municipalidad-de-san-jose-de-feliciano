<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Vehiculo;
use App\Models\Empleado;
use App\Models\User; 

class  Combustible extends Model
{  
    use HasFactory,SoftDeletes;
    protected $table = 'combustibles';
    protected $fillable = [
        'vehiculo_id',
        'empleado_id',
        'user_id',
        'codigo',
        'litros',
        'tipo',
        'precio',
        'estacion',
        'fecha',
        'monto',
        'tipo_de_pago',
        'observaciones',
        'imagen_factura',
        'estado',
    ];
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id')->withDefault(); 
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    } 
}
