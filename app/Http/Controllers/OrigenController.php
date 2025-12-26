<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'equipo' => \App\Models\Equipo::class, 
        ];

        if (!isset($map[$tipo])) {
            return response()->json([], 400);
        }

        $model = $map[$tipo];

        if ($model === \App\Models\Vehiculo::class) {
            $items = $model::query()
                ->select('id', 'patente', 'marca', 'modelo', 'anio', 'color', 'tipo')
                ->get()
                ->map(function ($v) {
                    return [
                        'id' => $v->id,
                        'patente' => $v->patente,
                        'marca' => $v->marca,
                        'modelo' => $v->modelo,
                        'anio' => $v->anio,
                        'color' => $v->color,
                        'tipo' => $v->tipo,
                        // compatibilidad (si algún select/uso viejo esperaba "nombre")
                        'nombre' => trim(($v->patente ?? '') . ' - ' . ($v->modelo ?? '')),
                    ];
                })
                ->values();

            return response()->json($items);
        }

        if ($model === \App\Models\Obra::class) {
            $items = $model::query()
                ->select('id', 'nombre', 'direccion', 'barrio', 'responsable', 'ejecutado_por', 'estado_obra')
                ->get();

            return response()->json($items);
        }

        if ($model === \App\Models\Equipo::class) {
            $items = $model::with('area')
                ->select('id', 'equipamiento', 'marca', 'descripcion', 'catalogacion', 'area_id')
                ->get()
                ->map(function ($e) {
                    return [
                        'id' => $e->id,
                        'equipamiento' => $e->equipamiento,
                        'marca' => $e->marca,
                        'descripcion' => $e->descripcion,
                        'catalogacion' => $e->catalogacion,
                        'area_nombre' => $e->area ? $e->area->nombre : '-',
                        // compatibilidad (si algún select/uso viejo esperaba "nombre")
                        'nombre' => trim(($e->equipamiento ?? '') . ' - ' . ($e->descripcion ?? '') . ' - ' . ($e->marca ?? '') . ' - ' . ($e->catalogacion ?? '')),
                    ];
                })
                ->values();

            return response()->json($items);
        }

        // Depósito (y otros): mantener el formato simple
        $items = $model::query()
            ->select('id', 'nombre')
            ->get();

        return response()->json($items);
    }

   // Devuelve productos asignados al elemento (usando relaciones y pivote)
    public function productos($tipo, $id)
    {
        $modelClass = match ($tipo) {
            'obra' => \App\Models\Obra::class,
            'deposito' => \App\Models\Deposito::class,
            'vehiculo' => \App\Models\Vehiculo::class,
            'equipo' => \App\Models\Equipo::class,
            default => null,
        };

        if (!$modelClass) {
            return response()->json([], 400);
        }

        // ✅ Cargar productos CON los campos del pivot necesarios
        $elemento = $modelClass::with(['productos' => function ($query) {
            $query->withPivot('id', 'cantidad_asignada', 'stock', 'detalle_compra_id', 'created_at');
        }])->find($id);

        if (!$elemento) {
            return response()->json([], 404);
        }

        // ✅ Mapear CADA registro del pivot como un item separado (no agrupar)
        $productos = $elemento->productos->map(function ($p) {
            return [
                'pivot_id' => $p->pivot->id ?? null,  // ← ID único del pivot
                'producto_id' => $p->id,
                'nombre' => $p->nombre,
                'cantidad_asignada' => $p->pivot->cantidad_asignada ?? 0,
                'stock' => $p->pivot->stock ?? 0,
                'detalle_compra_id' => $p->pivot->detalle_compra_id ?? null,
                'fecha_asignacion' => $p->pivot->created_at ?? null, // ← Para mostrar al usuario
            ];
        })->values();

        return response()->json($productos);
    }

}
