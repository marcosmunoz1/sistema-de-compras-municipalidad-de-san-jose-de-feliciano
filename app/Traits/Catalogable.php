<?php

namespace App\Traits;

use App\Models\Catalogacion;

trait Catalogable
{
    public static function bootCatalogable()
    {
        // Al crear
        static::creating(function ($model) {
            if (empty($model->catalogacion)) {
                $tipo = strtolower(class_basename($model)); // 'equipo' o 'vehiculo'
                $codigo = Catalogacion::generarCodigo($model->area_id, $tipo);
                $model->catalogacion = $codigo;
            }
        });

        // Después de crear, registrar en tabla de catalogaciones
        static::created(function ($model) {
            Catalogacion::create([
                'codigo' => $model->catalogacion,
                'area_id' => $model->area_id,
                'tipo' => strtolower(class_basename($model)),
                'item_id' => $model->id,
            ]);
        });

        // Al eliminar, eliminar también la catalogación
        static::deleted(function ($model) {
            Catalogacion::where('tipo', strtolower(class_basename($model)))
                ->where('item_id', $model->id)
                ->delete();
        });
    }
    /**
     * Relación con la catalogación
     */
    public function catalogacion_registro()
    {
        return $this->hasOne(Catalogacion::class, 'item_id')
            ->where('tipo', strtolower(class_basename($this)));
    }
}