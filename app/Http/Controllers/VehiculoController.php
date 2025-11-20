<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                    ->orWhere('motor', 'LIKE', "%{$search}%");

                // Búsqueda por estado
                if (!is_null($estadoBuscado)) {
                    $query->orWhere('estado_moto', $estadoBuscado);
                }
            })
            ->paginate(5);

        return view('admin.vehiculos.index', compact('vehiculos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());

        $request->validate([
            'marca' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'patente' => 'required|string|max:255|unique:vehiculos,patente',
            'modelo' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'anio' => 'required|integer',
            'chasis' => 'required|string|max:255|unique:vehiculos,chasis',
            'motor' => 'required|string|max:255|unique:vehiculos,motor',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
        ]);

        $vehiculo = new Vehiculo();
        $vehiculo->marca = $request->marca;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->patente = $request->patente;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->color = $request->color;
        $vehiculo->anio = $request->anio;
        $vehiculo->chasis = $request->chasis;
        $vehiculo->motor = $request->motor;

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
    public function show($id)
    {
        $vehiculo = Vehiculo::withTrashed()->findOrFail($id);
        return view('admin.vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::withTrashed()->findOrFail($id);
        return view('admin.vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //return response()->json($request->all());

        $request->validate([
            'marca' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'patente' => 'required|string|max:255|unique:vehiculos,patente,'.$id,
            'modelo' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'anio' => 'required|integer',
            'chasis' => 'required|string|max:255|unique:vehiculos,chasis,'.$id,
            'motor' => 'required|string|max:255|unique:vehiculos,motor,'.$id,
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
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
}
