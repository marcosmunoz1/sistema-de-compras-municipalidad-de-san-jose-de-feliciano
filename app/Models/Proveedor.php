<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Proveedor extends Model
{ 
    use HasFactory, SoftDeletes, LogsActivity;   
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

    protected $attributes = [
    'estado' => true,
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'razon_social', 'cuit', 'telefono', 'celular', 'email', 'direccion', 'localidad', 'provincia', 'pais', 'codigo_postal', 'observaciones'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Proveedor {$eventName}");
    }
}
