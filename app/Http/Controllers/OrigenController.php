<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrigenController extends Controller
{
    // Devuelve lista de elementos según tipo (obra, deposito, vehiculo)
    public function listar($tipo)
    {
        // Normalizamos posibles valores: aceptar 'obra' o la clase completa
        $map = [
            'obra' => \App\Models\Obra::class,
            'deposito' => \App\Models\Deposito::class,
            'vehiculo' => \App\Models\Vehiculo::class,
        ];

        if (!isset($map[$tipo])) {
            return response()->json([], 400);
        }

        $model = $map[$tipo];

        // Para vehiculo queremos mostrar patente + modelo; para otros el nombre
        $items = $model::select('id',
            $model === \App\Models\Vehiculo::class ? DB::raw("CONCAT(patente, ' - ', modelo) as nombre") : 'nombre'
        )->get();

        return response()->json($items);
    }

    // Devuelve productos asignados al elemento (usando relaciones y pivote)
   public function productos($tipo, $id)
    {
        // SIEMPRE usamos stock para mostrar lo que se puede mover
        $campoPivot = 'stock';

        $modelClass = match ($tipo) {
            'obra' => \App\Models\Obra::class,
            'deposito' => \App\Models\Deposito::class,
            'vehiculo' => \App\Models\Vehiculo::class,
            default => null,
        };

        if (!$modelClass) {
            return response()->json([], 400);
        }

        $elemento = $modelClass::with(['productos'])->find($id);

        if (!$elemento) {
            return response()->json([], 404);
        }

        $productos = $elemento->productos->map(function ($p) use ($campoPivot) {
            return [
                'id' => $p->id,
                'nombre' => $p->nombre,
                'stock' => $p->pivot->{$campoPivot} ?? 0,
                'cantidad_asignada' => $p->pivot->cantidad_asignada ?? 0,
                'detalle_compra_id' => $p->pivot->detalle_compra_id ?? null,
            ];
        })->values();

        return response()->json($productos);
    }

}
