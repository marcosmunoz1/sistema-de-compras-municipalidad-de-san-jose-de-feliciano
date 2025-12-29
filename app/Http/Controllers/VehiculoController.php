<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Tipo_combustibles;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $search = $request->input('search');

        // Convertimos el texto buscado a estado booleano
        $estadoBuscado = null;

        if ($search !== null) {
            $s = strtolower($search);

            if ($s === 'activo') {
                $estadoBuscado = 1;
            } elseif ($s === 'inactivo') {
                $estadoBuscado = 0;
            }
        }

        $vehiculos = Vehiculo::withTrashed()
            ->where(function ($query) use ($search, $estadoBuscado) {

                // Búsqueda de texto
                $query->where('marca', 'LIKE', "%{$search}%")
                    ->orWhere('tipo', 'LIKE', "%{$search}%")
                    ->orWhere('patente', 'LIKE', "%{$search}%")
                    ->orWhere('modelo', 'LIKE', "%{$search}%")
                    ->orWhere('color', 'LIKE', "%{$search}%")
                    ->orWhere('anio', 'LIKE', "%{$search}%")
                    ->orWhere('chasis', 'LIKE', "%{$search}%")
                    ->orWhere('motor', 'LIKE', "%{$search}%")
                    ->orWhere('catalogacion', 'LIKE', "%{$search}%");

                // Búsqueda por estado
                if (!is_null($estadoBuscado)) {
                    $query->orWhere('estado', $estadoBuscado);
                }
                // Búsqueda por área
                $query->orWhereHas('area', function ($qa) use ($search) {
                    $qa->where('nombre', 'LIKE', "%{$search}%");
                });
            })
            ->paginate(5)
            ->withQueryString();

        return view('admin.vehiculos.index', compact('vehiculos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        $tiposCombustibles = Tipo_combustibles::all();
        return view('admin.vehiculos.create', compact('areas', 'tiposCombustibles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());

        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'marca' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'patente' => 'required|string|max:255|unique:vehiculos,patente',
            'modelo' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
            'anio' => 'required|integer',
            'chasis' => 'nullable|string|max:255|unique:vehiculos,chasis',
            'motor' => 'nullable|string|max:255|unique:vehiculos,motor',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'tipo_combustible_id' => 'required|exists:tipo_combustibles,id'
        ], [
            'area_id.required' => 'El área es obligatoria.',
            'area_id.exists'   => 'El área seleccionada no es válida.',

            'tipo_combustible_id.required' => 'El tipo combustible es obligatorio.',
            'tipo_combustible_id.exists'   => 'El tipo combustible seleccionado no es válido.',

            'marca.required'   => 'La marca es obligatoria.',
            'marca.string'     => 'La marca debe ser texto.',
            'marca.max'        => 'La marca no puede superar los 255 caracteres.',

            'tipo.required'    => 'El tipo de vehículo es obligatorio.',
            'tipo.string'      => 'El tipo debe ser texto.',

            'patente.required' => 'La patente es obligatoria.',
            'patente.string'   => 'La patente debe ser texto.',
            'patente.max'      => 'La patente no puede superar los 255 caracteres.',
            'patente.unique'   => 'Ya existe un vehículo con esta patente.',

            'modelo.required'  => 'El modelo es obligatorio.',
            'modelo.string'    => 'El modelo debe ser texto.',
            'modelo.max'       => 'El modelo no puede superar los 255 caracteres.',

            'color.required'   => 'El color es obligatorio.',
            'color.string'     => 'El color debe ser texto.',
            'color.max'        => 'El color no puede superar los 255 caracteres.',

            'anio.required'    => 'El año es obligatorio.',
            'anio.integer'     => 'El año debe ser un número entero.',

            'chasis.string'    => 'El chasis debe ser texto.',
            'chasis.max'       => 'El chasis no puede superar los 255 caracteres.',
            'chasis.unique'    => 'Ya existe un vehículo con este número de chasis.',

            'motor.string'     => 'El motor debe ser texto.',
            'motor.max'        => 'El motor no puede superar los 255 caracteres.',
            'motor.unique'     => 'Ya existe un vehículo con este número de motor.',

            'imagen.image'     => 'El archivo debe ser una imagen.',
            'imagen.mimes'     => 'La imagen debe ser JPEG, PNG, JPG, GIF o SVG.',
            'imagen.max'       => 'La imagen no puede superar los 16 MB.',
        ]);

        $vehiculo = new Vehiculo();
        $vehiculo->area_id = $request->area_id;
        $vehiculo->marca = $request->marca;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->patente = $request->patente;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->color = $request->color;
        $vehiculo->anio = $request->anio;
        $vehiculo->chasis = $request->chasis;
        $vehiculo->motor = $request->motor;
        $vehiculo->tipo_combustible_id = $request->tipo_combustible_id;

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            if($vehiculo->imagen && Storage::disk('public')->exists($vehiculo->imagen)) {
                Storage::disk('public')->delete($vehiculo->logo);
            }
            $vehiculo->imagen = $request->file('imagen')->store('vehiculos_imagen', 'public');
        }

        $vehiculo->save();

        return redirect()->route('vehiculos.index')->with('mensaje', 'Vehículo creado exitosamente.')
                                                    ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $search = $request->input('search');
        $areas = Area::all();
        $tiposCombustibles = Tipo_combustibles::all();

        // Traemos productos del vehículo con relación pivot
        $productos = DB::table('producto_vehiculo as pv')
            ->join('productos as p', 'p.id', '=', 'pv.producto_id')
            ->leftJoin('detalle_compras as dc', 'dc.id', '=', 'pv.detalle_compra_id')
            ->leftJoin('compras as c', 'c.id', '=', 'dc.compra_id')
            ->select(
                'p.nombre',
                'p.descripcion',
                'pv.cantidad_asignada',
                'pv.stock',
                'dc.precio',
                'c.fecha_orden',
                'c.id as compra_id',
                // Subtotal basado en stock actual
                DB::raw('(pv.stock * COALESCE(dc.precio, 0)) as subtotal_real')
            )
            ->where('pv.vehiculo_id', $vehiculo->id)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('p.nombre', 'LIKE', "%{$search}%")
                        ->orWhere('p.descripcion', 'LIKE', "%{$search}%")
                        ->orWhere('pv.cantidad_asignada', 'LIKE', "%{$search}%")
                        ->orWhere('pv.stock', 'LIKE', "%{$search}%")
                        ->orWhere('dc.precio', 'LIKE', "%{$search}%")
                        ->orWhere(DB::raw('(pv.stock * COALESCE(dc.precio, 0))'), 'LIKE', "%{$search}%")
                        ->orWhere('c.fecha_orden', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('c.fecha_orden', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Total general usando stock
        $totalGeneral = DB::table('producto_vehiculo as pv')
            ->leftJoin('detalle_compras as dc', 'dc.id', '=', 'pv.detalle_compra_id')
            ->where('pv.vehiculo_id', $vehiculo->id)
            ->selectRaw('SUM(pv.stock * COALESCE(dc.precio, 0)) as total')
            ->value('total');

        return view('admin.vehiculos.show', compact('vehiculo', 'productos', 'totalGeneral', 'search', 'areas', 'tiposCombustibles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tiposCombustibles = Tipo_combustibles::all();
        $vehiculo = Vehiculo::withTrashed()->with('area', 'tipo_combustible')->findOrFail($id);
        return view('admin.vehiculos.edit', compact('vehiculo', 'tiposCombustibles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //return response()->json($request->all());

        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'marca'   => 'required|string|max:255',
            'tipo'    => 'required|string|max:255',
            'patente' => 'required|string|max:255|unique:vehiculos,patente,' . $id,
            'modelo'  => 'required|string|max:255',
            'color'   => 'required|string|max:255',
            'anio'    => 'required|integer',
            'chasis'  => 'required|string|max:255|unique:vehiculos,chasis,' . $id,
            'motor'   => 'required|string|max:255|unique:vehiculos,motor,' . $id,
            'imagen'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'tipo_combustible_id' => 'required|exists:tipo_combustibles,id'
        ], [
            'marca.required'   => 'La marca es obligatoria.',
            'marca.string'     => 'La marca debe ser texto.',
            'marca.max'        => 'La marca no puede superar los 255 caracteres.',

            'tipo_combustible_id.required' => 'El tipo combustible es obligatorio.',
            'tipo_combustible_id.exists'   => 'El tipo combustible seleccionado no es válido.',

            'tipo.required'    => 'El tipo de vehículo es obligatorio.',
            'tipo.string'      => 'El tipo debe ser texto.',

            'patente.required' => 'La patente es obligatoria.',
            'patente.string'   => 'La patente debe ser texto.',
            'patente.max'      => 'La patente no puede superar los 255 caracteres.',
            'patente.unique'   => 'Ya existe un vehículo con esta patente.',

            'modelo.required'  => 'El modelo es obligatorio.',
            'modelo.string'    => 'El modelo debe ser texto.',
            'modelo.max'       => 'El modelo no puede superar los 255 caracteres.',

            'color.required'   => 'El color es obligatorio.',
            'color.string'     => 'El color debe ser texto.',
            'color.max'        => 'El color no puede superar los 255 caracteres.',

            'anio.required'    => 'El año es obligatorio.',
            'anio.integer'     => 'El año debe ser un número entero.',

            'chasis.required'  => 'El número de chasis es obligatorio.',
            'chasis.string'    => 'El chasis debe ser texto.',
            'chasis.max'       => 'El chasis no puede superar los 255 caracteres.',
            'chasis.unique'    => 'Ya existe un vehículo con este número de chasis.',

            'motor.required'   => 'El número de motor es obligatorio.',
            'motor.string'     => 'El motor debe ser texto.',
            'motor.max'        => 'El motor no puede superar los 255 caracteres.',
            'motor.unique'     => 'Ya existe un vehículo con este número de motor.',

            'imagen.image'     => 'El archivo debe ser una imagen.',
            'imagen.mimes'     => 'La imagen debe ser JPEG, PNG, JPG, GIF o SVG.',
            'imagen.max'       => 'La imagen no puede superar los 16 MB.',
        ]);


        $vehiculo = Vehiculo::withTrashed()->findOrFail($id);
        $vehiculo->marca = $request->marca;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->patente = $request->patente;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->color = $request->color;
        $vehiculo->anio = $request->anio;
        $vehiculo->chasis = $request->chasis;
        $vehiculo->motor = $request->motor;
        $vehiculo->tipo_combustible_id = $request->tipo_combustible_id;
        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            if($vehiculo->imagen && Storage::disk('public')->exists($vehiculo->imagen)) {
                Storage::disk('public')->delete($vehiculo->imagen);
            }
            $vehiculo->imagen = $request->file('imagen')->store('vehiculos_imagen', 'public');
        }

        $vehiculo->save();
        return redirect()->route('vehiculos.index')->with('mensaje', 'Vehículo actualizado exitosamente.')
                                                    ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

         // Marca como inactivo
        $vehiculo->estado = false;
        $vehiculo->save();

        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('mensaje', 'Vehículo eliminado exitosamente.')
                                                    ->with('icono', 'success');
    }
    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $vehiculo = Vehiculo::withTrashed()->findOrFail($id);
        $vehiculo->restore();
        $vehiculo->estado = true;
        $vehiculo->save();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo restaurado exitosamente.');
    }

    public function productos(Vehiculo $vehiculo)
    {
        // Traemos los productos con la cantidad asignada
        $productos = $vehiculo->productos()
            ->select('productos.id', 'productos.nombre')
            ->withPivot('cantidad')
            ->get()
            ->map(function ($p) {
                return [
                    'id' => $p->id,
                    'nombre' => $p->nombre,
                    'cantidad_asignada' => $p->pivot->cantidad,
                ];
            });

        return response()->json($productos);
    }


}
