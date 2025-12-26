<?php

namespace App\Models;
use App\Models\Proveedor;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Compra extends Model
{   
    use SoftDeletes, LogsActivity; 
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
        'total',
        'foto_factura',
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
        return $this->hasMany(Detalle_Compra::class, 'compra_id'); 
    }
    public function getDestinoNombreAttribute()
    {
        if (!$this->destino) {
            return 'No asignado';
        }

        // Dependiendo del modelo destino, devolvemos su atributo real
        return match ($this->destino_tipo) {
            \App\Models\Vehiculo::class => $this->destino->patente,
            \App\Models\Deposito::class => $this->destino->nombre,
            \App\Models\Obra::class     => $this->destino->nombre,
            \App\Models\Equipo::class   => $this->destino->equipamiento ?? 'Sin nombre',
            default                     => 'No disponible'
        };
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['proveedor_id', 'empleado_id', 'destino_tipo', 'destino_id', 'nr_orden', 'fecha_orden', 'estado_compra', 'total', 'observacion'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Compra {$eventName}");
    }

}
