<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Vehiculo;
use App\Models\Combustible;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Empleado extends Model
{
    use HasFactory, SoftDeletes, LogsActivity; 
    protected $table = 'empleados'; 
    protected $fillable = [
      'nombre',
      'dni',
      'celular',
      'direccion',
      'email',
      'puesto',
      'area',
      'observaciones',
      'estado',
    ];

    protected $attributes = [
      'estado' => true,
    ];
    public function combustible() 
    {
      return $this->hasMany(Combustible::class); 
    } 

    public function compra()
    {
        return $this->hasMany(Compra::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'dni', 'celular', 'direccion', 'email', 'puesto', 'area', 'observaciones', 'estado'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Empleado {$eventName}");
    }
}
