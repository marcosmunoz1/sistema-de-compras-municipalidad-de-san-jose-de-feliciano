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
        ], [
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
            'marca'   => 'required|string|max:255',
            'tipo'    => 'required|string|max:255',
            'patente' => 'required|string|max:255|unique:vehiculos,patente,' . $id,
            'modelo'  => 'required|string|max:255',
            'color'   => 'required|string|max:255',
            'anio'    => 'required|integer',
            'chasis'  => 'required|string|max:255|unique:vehiculos,chasis,' . $id,
            'motor'   => 'required|string|max:255|unique:vehiculos,motor,' . $id,
            'imagen'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
        ], [
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
