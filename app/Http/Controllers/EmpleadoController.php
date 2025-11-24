<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
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

        $empleados = Empleado::withTrashed()
            ->where(function ($query) use ($search, $estadoBuscado) {

                // Búsqueda por texto en varios campos
                $query->where('nombre', 'LIKE', "%{$search}%")
                    ->orWhere('dni', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('celular', 'LIKE', "%{$search}%")
                    ->orWhere('direccion', 'LIKE', "%{$search}%")
                    ->orWhere('puesto', 'LIKE', "%{$search}%")
                    ->orWhere('area', 'LIKE', "%{$search}%")
                    ->orWhere('observaciones', 'LIKE', "%{$search}%");

                // Si escriben "activo" o "inactivo"
                if (!is_null($estadoBuscado)) {
                    $query->orWhere('estado', $estadoBuscado);
                }
            })
            ->paginate(10);

        return view('admin.empleados.index', compact('empleados'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:empleados,dni',
            'email' => 'nullable|email|max:255|unique:empleados,email',
            'celular' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'puesto' => 'nullable|string|max:100',
            'area' => 'nullable|string|max:100',
            'observaciones' => 'nullable|string|max:500',
        ],
        [
            'nombre.required' => 'El nombre es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.unique' => 'El DNI ya está registrado.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
        ]);

        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->dni = $request->dni;
        $empleado->email = $request->email;
        $empleado->celular = $request->celular;
        $empleado->direccion = $request->direccion;
        $empleado->puesto = $request->puesto;
        $empleado->area = $request->area;
        $empleado->observaciones = $request->observaciones;

        $empleado->save();
        return redirect()->route('empleados.index')->with('mensaje', 'Empleado creado exitosamente.')
                                                    ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleado = Empleado::withTrashed()->findOrFail($id);
        return view('admin.empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = Empleado::withTrashed()->findOrFail($id);
        return view('admin.empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:empleados,dni,' . $id, 
            'email' => 'nullable|email|max:255|unique:empleados,email,' . $id,
            'celular' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'puesto' => 'nullable|string|max:100',
            'area' => 'nullable|string|max:100',
            'observaciones' => 'nullable|string|max:500',
        ],
        [
            'nombre.required' => 'El nombre es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.unique' => 'El DNI ya está registrado.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
        ]);

        $empleado = Empleado::withTrashed()->findOrFail($id);
        $empleado->nombre = $request->nombre; 
        $empleado->dni = $request->dni;
        $empleado->email = $request->email;
        $empleado->celular = $request->celular;
        $empleado->direccion = $request->direccion;
        $empleado->puesto = $request->puesto;
        $empleado->area = $request->area;
        $empleado->observaciones = $request->observaciones;
        $empleado->save();

        return redirect()->route('empleados.index')->with('mensaje', 'Empleado actualizado exitosamente.')
                                                    ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->estado = false;
        $empleado->save();

        $empleado->delete();
        return redirect()->route('empleados.index')->with('mensaje', 'Empleado eliminado exitosamente.')
                                                    ->with('icono', 'success');
    }
    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $empleado = Empleado::withTrashed()->findOrFail($id);

        $empleado->restore();

        $empleado->estado = true;
        $empleado->save();
        
        return redirect()->route('empleados.index')->with('mensaje', 'Empleado restaurado exitosamente.')
                                                    ->with('icono', 'success');
    }
}
