<?php

namespace App\Http\Controllers;

use App\Models\Producto; 
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Deposito;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $categorias = Categoria::all();
        $search = $request->input('search'); 
        $productos = Producto::where('nombre', 'LIKE', "%{$search}%")
            ->orWhere('descripcion', 'LIKE', "%{$search}%")
            ->orWhere('unidad', 'LIKE', "%{$search}%")
            ->orWhere('estado', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('admin.productos.index', compact('productos', 'categorias')); 
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        /* return response()->json($request->all());   */
        $request->validate([
            'categoria_id' => 'required', 
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidad' => 'required'
        ]);

        $producto = new Producto();
        $producto->categoria_id = $request->categoria_id; 
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->unidad = $request->unidad;
        $producto->estado = true; 
        $producto->save(); 

        return redirect()->route('productos.index')
        ->with('mensaje', 'Producto creado exitosamente.')
        ->with('icono', 'success'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id); 
        return view('admin.productos.show', compact('producto')); 
    }
   public function data($id) 
    {
        $producto = Producto::findOrFail($id); 
        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id) 
    { 
        $request->validate([
            'categoria_id' => 'required', 
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidad' => 'required'
        ]);

        $producto = Producto::findOrFail($id); 
        $producto->categoria_id = $request->categoria_id; 
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->unidad = $request->unidad;
        $producto->estado = true; 
        $producto->save(); 

        return redirect()->route('productos.index')
        ->with('mensaje', 'Producto actualizado exitosamente.')
        ->with('icono', 'success'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {   
        $producto = Producto::findOrFail($id); 
        $producto->estado = false; 
        $producto->save();
        $producto->delete(); 
        return redirect()->route('productos.index')
        ->with('mensaje', 'Producto eliminado exitosamente.')
        ->with('icono', 'success'); 
    }
    public function restore($id) 
    {   
        $producto = Producto::findOrFail($id); 
        $producto->estado = true; 
        $producto->save(); 
        $producto->restore(); 
        return redirect()->route('productos.index')
        ->with('mensaje', 'Producto restaurado exitosamente.')
        ->with('icono', 'success'); 
    } 

    public function productos(Deposito $deposito)
    {
        $productos = $deposito->productos()
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
