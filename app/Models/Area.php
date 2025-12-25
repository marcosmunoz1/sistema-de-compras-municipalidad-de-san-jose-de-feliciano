<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'prefijo_catalogacion',
    ];

    // Relación con Equipos
    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class);
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }

    public function catalogaciones()
    {
        return $this->hasMany(Catalogacion::class);
    }
}