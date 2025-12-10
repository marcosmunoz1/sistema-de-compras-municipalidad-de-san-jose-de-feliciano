<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Convertir texto a estado
        $estadoBuscado = null;

        if ($search !== null) {
            $s = strtolower($search);

            if ($s === 'activo') {
                $estadoBuscado = 1;
            } elseif ($s === 'inactivo') {
                $estadoBuscado = 0;
            }
        }

        $obras = Obra::withTrashed()
            ->where(function ($query) use ($search, $estadoBuscado) {

                // Búsqueda por texto en varios campos
                $query->where('nombre', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->orWhere('direccion', 'LIKE', "%{$search}%")
                    ->orWhere('barrio', 'LIKE', "%{$search}%")
                    ->orWhere('ciudad', 'LIKE', "%{$search}%")
                    ->orWhere('responsable', 'LIKE', "%{$search}%")
                    ->orWhere('resolucion_decreto', 'LIKE', "%{$search}%")
                    ->orWhere('fecha_inicio', 'LIKE', "%{$search}%")
                    ->orWhere('fecha_estimada_fin', 'LIKE', "%{$search}%")
                    ->orWhere('fecha_fin', 'LIKE', "%{$search}%")
                    ->orWhere('estado_obra', 'LIKE', "%{$search}%")
                    ->orWhere('presupuesto', 'LIKE', "%{$search}%")
                    ->orWhere('ejecutado_por', 'LIKE', "%{$search}%")
                    ->orWhere('observaciones', 'LIKE', "%{$search}%");

                // Si escriben "activo" o "inactivo"
                if (!is_null($estadoBuscado)) {
                    $query->orWhere('estado', $estadoBuscado);
                }
            })
            ->paginate(10);

        return view('admin.obras.index', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.obras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'direccion' => 'nullable|string|max:255',
        'barrio' => 'nullable|string|max:100',
        'ciudad' => 'nullable|string|max:150',
        'responsable' => 'nullable|string|max:255',
        'resolucion_decreto' => 'nullable|string|max:255',
        'fecha_inicio' => 'nullable|date',
        'fecha_estimada_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        'estado_obra' => 'required|in:planificada,en_ejecucion,demorada,finalizada,cancelada',
        'presupuesto' => 'nullable|numeric|min:0',
        'ejecutado_por' => 'required|string|max:255',
        'observaciones' => 'nullable|string',
        ],
        [
            'nombre.required' => 'El nombre es obligatorio.',
            'estado_obra.required' => 'El estado de la obra es obligatorio.',
        ]);

        $obra = new Obra();
        $obra->nombre = $request->nombre;
        $obra->descripcion = $request->descripcion;
        $obra->direccion = $request->direccion;
        $obra->barrio = $request->barrio;
        $obra->responsable = $request->responsable;
        $obra->resolucion_decreto = $request->resolucion_decreto;
        $obra->fecha_inicio = $request->fecha_inicio;
        $obra->fecha_estimada_fin = $request->fecha_estimada_fin;
        $obra->fecha_fin = $request->fecha_fin;
        $obra->estado_obra = $request->estado_obra;
        $obra->presupuesto = $request->presupuesto;
        $obra->ejecutado_por = $request->ejecutado_por;
        $obra->observaciones = $request->observaciones;

        $obra->save();

        return redirect()->route('obras.index')->with('mensaje', 'Obra creada exitosamente.')
                                                ->with('icono', 'success');
        
    }

    /**
     * Display the specified resource.
     */
   public function show(Request $request, $id)
    {
        $obra = Obra::findOrFail($id);
        $search = $request->input('search');

        $productos = DB::table('obra_producto as op')
            ->join('productos as p', 'p.id', '=', 'op.producto_id')
            ->leftJoin('detalle_compras as dc', 'dc.id', '=', 'op.detalle_compra_id')
            ->leftJoin('compras as c', 'c.id', '=', 'dc.compra_id')
            ->select(
                'p.nombre',
                'p.descripcion',

                // cantidad comprada originalmente
                'dc.cantidad as cantidad_original',

                // cantidad que tiene la obra
                'op.cantidad_asignada as cantidad_usada',

                // precio unitario
                'dc.precio',

                // ⭐ SUBTOTAL REAL SEGÚN LA COMPRA ORIGINAL ⭐
                DB::raw('(dc.cantidad * dc.precio) as subtotal_original'),

                'c.fecha_orden',
                'c.id as compra_id'
            )
            ->where('op.obra_id', $obra->id)

            // 🔍 BUSCADOR (adaptado a toda la nueva info)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('p.nombre', 'LIKE', "%{$search}%")
                        ->orWhere('op.cantidad_asignada', 'LIKE', "%{$search}%")
                        ->orWhere('dc.precio', 'LIKE', "%{$search}%")

                        // Buscamos por subtotal original también
                        ->orWhere(DB::raw('(dc.cantidad * dc.precio)'), 'LIKE', "%{$search}%")

                        ->orWhere('c.fecha_orden', 'LIKE', "%{$search}%");
                });
            })

            ->orderBy('c.fecha_orden', 'desc')
            ->paginate(10);


        // Total general de la obra
        $totalGeneral = DB::table('obra_producto as op')
            ->leftJoin('detalle_compras as dc', 'dc.id', '=', 'op.detalle_compra_id')
            ->where('op.obra_id', $obra->id)
            ->selectRaw('SUM(dc.cantidad * COALESCE(dc.precio, 0)) as total')
            ->value('total');



        return view('admin.obras.show', compact('obra', 'productos', 'totalGeneral', 'search'));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obra = Obra::withTrashed()->findOrFail($id);
        return view('admin.obras.edit', compact('obra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion' => 'nullable|string|max:255',
            'barrio' => 'nullable|string|max:100',
            'ciudad' => 'nullable|string|max:150',
            'responsable' => 'nullable|string|max:255',
            'telefono_responsable' => 'nullable|string|max:30',
            'fecha_inicio' => 'nullable|date',
            'fecha_estimada_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'estado_obra' => 'required|in:planificada,en_ejecucion,demorada,finalizada,cancelada',
            'presupuesto' => 'nullable|numeric|min:0',
            'monto_ejecutado' => 'nullable|numeric|min:0',
            'observaciones' => 'nullable|string',
        ],
        [
            'nombre.required' => 'El nombre es obligatorio.',
            'estado_obra.required' => 'El estado de la obra es obligatorio.',
        ]);

        // Asignación de valores
        $obra = Obra::withTrashed()->findOrFail($id);
        $obra->nombre = $request->nombre;
        $obra->descripcion = $request->descripcion;
        $obra->direccion = $request->direccion;
        $obra->barrio = $request->barrio;
        $obra->ciudad = $request->ciudad;
        $obra->responsable = $request->responsable;
        $obra->telefono_responsable = $request->telefono_responsable;
        $obra->fecha_inicio = $request->fecha_inicio;
        $obra->fecha_estimada_fin = $request->fecha_estimada_fin;
        $obra->fecha_fin = $request->fecha_fin;
        $obra->estado_obra = $request->estado_obra;
        $obra->presupuesto = $request->presupuesto;
        $obra->monto_ejecutado = $request->monto_ejecutado;
        $obra->observaciones = $request->observaciones;

        $obra->save();

        return redirect()->route('obras.index')
            ->with('mensaje', 'Obra actualizada exitosamente.')
            ->with('icono', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $obra = Obra::findOrFail($id);

        $obra->estado = false;
        $obra->save();

        $obra->delete();
        return redirect()->route('obras.index')->with('mensaje', 'Obra eliminada exitosamente.')
                                                    ->with('icono', 'success');
    }
    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $obra = Obra::withTrashed()->findOrFail($id);

        $obra->restore();

        $obra->estado = true;
        $obra->save();
        
        return redirect()->route('obras.index')->with('mensaje', 'Obra restaurado exitosamente.')
                                                    ->with('icono', 'success');
    }
    public function productosAsignados(Obra $obra)
    {
        return response()->json(
            $obra->productos()->select('productos.id', 'productos.nombre', 'obra_producto.cantidad_asignada')->get()
        );
    }
}
