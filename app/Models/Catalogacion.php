<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogacion extends Model
{
    protected $table = 'catalogaciones';
    
    protected $fillable = [
        'codigo',
        'area_id',
        'tipo',
        'item_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Generar el siguiente código de catalogación para un área
     */
    public static function generarCodigo($areaId, $tipo)
    {
        $area = Area::findOrFail($areaId);
        $prefijo = $area->prefijo_catalogacion;

        // Obtener el último número usado en esta área (para cualquier tipo)
        $ultimaCatalogacion = self::where('area_id', $areaId)
            ->orderByRaw('CAST(SUBSTRING(codigo, ' . (strlen($prefijo) + 1) . ') AS UNSIGNED) DESC')
            ->first();

        if ($ultimaCatalogacion) {
            $ultimoNumero = (int) str_replace($prefijo, '', $ultimaCatalogacion->codigo);
            $nuevoNumero = $ultimoNumero + 1;
        } else {
            $nuevoNumero = 1;
        }

        return $prefijo . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);
    }
}