<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Vehiculo;
use App\Models\Empleado;
use App\Models\User;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class  Combustible extends Model
{  
    use HasFactory, SoftDeletes, LogsActivity;  
    protected $table = 'combustibles';
    protected $fillable = [
        'empleado_id', 
        'user_id',
        'codigo',
        'litros',
        'tipo',
        'sub_cuenta',
        'precio',
        'estacion',
        'fecha',
        'destino_tipo',
        'destino_id',
        'monto',
        'tipo_de_pago',
        'observaciones',
        'imagen_factura',
        'estado',
    ];
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id')->withDefault(); 
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function destino()
    {
        return $this->morphTo(__FUNCTION__, 'destino_tipo', 'destino_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['empleado_id',
            'user_id',
            'codigo',
            'litros',
            'tipo',
            'sub_cuenta',
            'precio',
            'estacion',
            'fecha',
            'destino_tipo',
            'destino_id',
            'monto',
            'tipo_de_pago',
            'observaciones',
            'imagen_factura',
            'estado'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Combustible {$eventName}");
    }    

}
