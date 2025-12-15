<?php

namespace App\Models;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'compra_id',
        'tipo',
        'origen_tipo',
        'origen_id',
        'destino_tipo',
        'destino_id',
        'fecha',
        'observacion'
    ];

    private function labelParaModelo(?EloquentModel $model): string
    {
        if (!$model) {
            return '---';
        }

        if (!is_null($model->getAttribute('nombre')) && $model->getAttribute('nombre') !== '') {
            return (string) $model->getAttribute('nombre');
        }

        if ($model instanceof Vehiculo) {
            $partes = array_filter([
                $model->getAttribute('patente'),
                trim((string) $model->getAttribute('marca') . ' ' . (string) $model->getAttribute('modelo')),
            ], fn ($v) => !is_null($v) && trim((string) $v) !== '');

            return $partes ? implode(' - ', $partes) : 'Sin nombre';
        }

        if (!is_null($model->getAttribute('patente')) && $model->getAttribute('patente') !== '') {
            return (string) $model->getAttribute('patente');
        }

        return 'Sin nombre';
    }
    
    public function detalles()
    {
        return $this->hasMany(MovimientoDetalle::class);
    }

    public function getOrigenLabelAttribute()
    {
        if (!$this->origen) return '---';

        return class_basename($this->origen) . ': ' . $this->labelParaModelo($this->origen);
    }

    public function getDestinoLabelAttribute() 
    {
        if (!$this->destino) return '---';

        return class_basename($this->destino) . ': ' . $this->labelParaModelo($this->destino);
    }


    // Relación polimórfica con el origen
    public function origen()
    {
        return $this->morphTo(__FUNCTION__, 'origen_tipo', 'origen_id')->withTrashed();
    }

    // Relación polimórfica con el destino
    public function destino()
    {
        return $this->morphTo(__FUNCTION__, 'destino_tipo', 'destino_id')->withTrashed();
    }

    // Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
