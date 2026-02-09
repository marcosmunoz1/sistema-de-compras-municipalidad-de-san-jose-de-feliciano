<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $estado = request('estado', 'activo');

        $query = Destino::query();

        // Aplicar búsqueda
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                    ->orWhere('tipo', 'like', "%{$search}%")
                    ->orWhere('descripcion', 'like', "%{$search}%");
            });
        }

        // Filtrar por estado
        if ($estado === 'inactivo') {
            $query->onlyTrashed();
        } elseif ($estado === 'todos') {
            $query->withTrashed();
        }

        $destinos = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.destinos.index', compact('destinos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|in:persona,policia,empresa,institucion,organismo_publico',
            'descripcion' => 'nullable|string|max:5000',
        ]);

        // Crear el destino
        Destino::create($request->all());

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino creado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destino $destino)
    {
        return response()->json($destino);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destino $destino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destino $destino)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|in:persona,policia,empresa,institucion,organismo_publico',
            'descripcion' => 'nullable|string|max:5000',
        ]);

        $destino->update($request->all());

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino actualizado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destino $destino)
    {
        $destino->delete();

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino eliminado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Restore a soft-deleted destino.
     */
    public function restore($id)
    {
        $destino = Destino::withTrashed()->findOrFail($id);
        $destino->restore();

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino restaurado exitosamente.')
            ->with('icono', 'success');
    }
}
