<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Categoria extends Model
{
  use HasFactory, SoftDeletes, LogsActivity;
  protected $table = 'categorias'; 
  protected $fillable = [
    'nombre',
    'slug',
    'descripcion',
    'estado',
  ];

  protected $attributes = [
    'estado' => true,
  ];

  public function productos()
  {
    return $this->hasMany(Producto::class);
  }

  public function getActivitylogOptions(): LogOptions
  {
      return LogOptions::defaults()
          ->logOnly(['nombre', 'slug', 'descripcion'])
          ->logOnlyDirty()
          ->dontSubmitEmptyLogs()
          ->setDescriptionForEvent(fn(string $eventName) => "Categoria {$eventName}");
  }
}
