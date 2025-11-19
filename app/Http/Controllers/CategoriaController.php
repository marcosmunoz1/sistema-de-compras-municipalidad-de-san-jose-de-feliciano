<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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

        $categorias = Categoria::withTrashed()
            ->where(function ($query) use ($search, $estadoBuscado) {
                // Búsqueda de texto
                $query->where('nombre', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%");

                // Búsqueda por estado si corresponde
                if (!is_null($estadoBuscado)) {
                    $query->orWhere('estado', $estadoBuscado);
                }
            })
            ->paginate(5);

        return view('admin.categorias.index', compact('categorias'));
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
        // Validación
        $request->validate(
            [
                'nombre'      => 'required|string|max:255|unique:categorias,nombre,' . $request->id,
                'slug'        => 'nullable|string|max:255',
                'descripcion' => 'required|string',
            ],
            [
                'nombre.required' => 'El campo nombre no puede estar vacío.',
                'nombre.unique'   => 'La categoría ya está registrada.',
                'descripcion.required' => 'La descripción no puede estar vacía.',
            ]
        );


        // ACCIÓN: CREAR
        if ($request->input('accion') == "1") {

            $categoria = new Categoria();
            $categoria->nombre = $request->nombre;
            $categoria->slug = $request->slug;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();

            return redirect()->route('categorias.index')
                ->with('mensaje', 'Categoría creada exitosamente.')
                ->with('icono', 'success');
        }


        // ACCIÓN: EDITAR
        if ($request->input('accion') == "2") {

            $categoria = Categoria::findOrFail($request->id);
            $categoria->nombre = $request->nombre;
            $categoria->slug = $request->slug;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();

            return redirect()->route('categorias.index')
                ->with('mensaje', 'Categoría actualizada correctamente.')
                ->with('icono', 'success');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        // Marcar como inactiva
        $categoria->estado = false;
        $categoria->save();

        // Soft delete
        $categoria->delete();

        return redirect()->back()
        ->with('mensaje', 'Categoría eliminada y marcada como inactiva.')
        ->with('icono', 'success');
    }


    public function restore($id)
    {
        $categoria = Categoria::withTrashed()->findOrFail($id);
        // Marca como inactivo
        $categoria->restore();
        $categoria->estado = true;
        $categoria->save();

        return back()->with('mensaje', 'Categoria restaurada correctamente.')
                    ->with('icono', 'success');
    }
}
