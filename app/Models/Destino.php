<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Destino extends Model
{
    use SoftDeletes, LogsActivity;  
    protected $table = 'destinos'; 
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion'
    ]; 
    protected $casts = [
        'estado' => 'boolean',
    ];

    
    public function destinos() 
    {
        return $this->morphTo('destino'); 
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'tipo', 'descripcion'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Destino {$eventName}");
    }
}
