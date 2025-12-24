<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

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

        $equipos = Equipo::with('area')
            ->withTrashed()
            ->when($search, function ($query) use ($search, $estadoBuscado) {
                $query->where(function ($q) use ($search, $estadoBuscado) {

                    // Búsqueda directa en equipos
                    $q->where('catalogacion', 'LIKE', "%{$search}%")
                    ->orWhere('equipamiento', 'LIKE', "%{$search}%")
                    ->orWhere('marca', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%");

                    // Búsqueda por estado
                    if (!is_null($estadoBuscado)) {
                        $q->orWhere('estado', $estadoBuscado);
                    }

                    // Búsqueda por área
                    $q->orWhereHas('area', function ($qa) use ($search) {
                        $qa->where('nombre', 'LIKE', "%{$search}%");
                    });
                });
            })
            ->paginate(10);

        return view('admin.equipos.index', compact('equipos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('admin.equipos.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'area_id' => 'required|exists:areas,id',
            'equipamiento' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ],
        [
            'area_id.required' => 'El área es obligatoria.',
            'area_id.exists'   => 'El área seleccionada no es válida.',
        ]);

        Equipo::create($validated);

        return redirect()->route('equipos.index')
            ->with('mensaje', 'Equipo creado exitosamente')
            ->with('icono', 'success');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipo = Equipo::with('area')->findOrFail($id);
        $areas = Area::all();
        return view('admin.equipos.show', compact('equipo','areas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipo = Equipo::with('area')->findOrFail($id);
        $areas = Area::all();
        return view('admin.equipos.edit', compact('equipo','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //return response()->json($request->all());
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'equipamiento' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->area_id = $request->area_id;
        $equipo->equipamiento = $request->equipamiento;
        $equipo->marca = $request->marca;
        $equipo->descripcion = $request->descripcion;
        $equipo->save();
        return redirect()->route('equipos.index')
            ->with('mensaje', 'Equipo actualizado exitosamente')
            ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    { 
        $equipo = Equipo::findOrFail($id);
        $equipo->estado = false; 
        $equipo->save();
        $equipo->delete();
        return redirect()->route('equipos.index')
        ->with('mensaje', 'Equipo eliminado correctamente')
        ->with('icono', 'success'); 
    }
    public function restore(string $id)
    {
        $equipo = Equipo::withTrashed()->find($id); 
        $equipo->restore(); 
        $equipo->estado = true;  
        $equipo->save();  
        return redirect()->route('equipos.index') 
        ->with('mensaje', 'Equipo restaurado exitosamente')
        ->with('icono', 'success');
    }
}
