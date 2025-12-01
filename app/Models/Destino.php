<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destino extends Model
{
    use SoftDeletes;  
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

}
