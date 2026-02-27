<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacturaCompra extends Model
{   
    protected $table = 'facturas_compra';
    protected $fillable = ['compra_id', 'archivo'];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
