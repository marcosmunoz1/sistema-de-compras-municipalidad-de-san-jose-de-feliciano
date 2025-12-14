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

        // Depósito (y otros): mantener el formato simple
        $items = $model::query()
            ->select('id', 'nombre')
            ->get();

        return response()->json($items);
    }

    // Devuelve productos asignados al elemento (usando relaciones y pivote)
    public function productos($tipo, $id)
    {
        // Usamos tu helper modeloDestino() si lo prefieres; aquí uso mapeo simple
        $campoPivot = match ($tipo) {
            'obra'     => 'cantidad_asignada',
            'deposito' => 'cantidad',
            'vehiculo' => 'cantidad',
            default    => null,
        };

        if (!$campoPivot) {
            return response()->json([], 400);
        }

        // Recuperar el modelo instanciado
        $modelClass = match ($tipo) {
            'obra' => \App\Models\Obra::class,
            'deposito' => \App\Models\Deposito::class,
            'vehiculo' => \App\Models\Vehiculo::class,
        };

        $elemento = $modelClass::with(['productos'])->find($id);

        if (!$elemento) {
            return response()->json([], 404);
        }

        // Mapear productos y tomar la cantidad según el pivot
        $productos = $elemento->productos->map(function ($p) use ($campoPivot) {
            // el nombre para vehiculo/otros asume campo nombre en producto
            return [
                'id' => $p->id,
                'nombre' => $p->nombre,
                'cantidad' => $p->pivot->{$campoPivot} ?? ($p->pivot->cantidad ?? 0),
                'detalle_compra_id' => $p->pivot->detalle_compra_id ?? null,
                // agregá más campos si los necesitás (precio, subtotal, etc.)
            ];
        })->values();

        return response()->json($productos);
    }
}
