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
        $estado = $request->input('estado');

        // Por defecto solo activos, con opción de ver todos o inactivos
        if ($estado === 'todos') {
            $query = Producto::withTrashed();
        } elseif ($estado === 'inactivo') {
            $query = Producto::withTrashed()->where('estado', false);
        } else {
            // Por defecto: solo activos
            $query = Producto::where('estado', true);
        }

        // Búsqueda
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'LIKE', "%{$search}%")
                    ->orWhere('descripcion', 'LIKE', "%{$search}%")
                    ->orWhere('unidad', 'LIKE', "%{$search}%")
                    ->orWhereHas('categoria', function ($subQ) use ($search) {
                        $subQ->where('nombre', 'LIKE', "%{$search}%");
                    });
            });
        }

        $productos = $query->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString(); 

        return view('admin.productos.index', compact('productos', 'categorias', 'search'));
    } 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidad' => 'required'
        ]);

        // CREAR
        if ($request->input('accion') == "1") {

            $producto = new Producto();
            $producto->categoria_id = $request->categoria_id;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->unidad = $request->unidad;
            $producto->estado = true;
            $producto->save();

            // 👉 SI VIENE POR AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'mensaje' => 'Producto creado exitosamente.',
                    'producto' => $producto
                ]);
            }


            return redirect()->route('productos.index')
                ->with('mensaje', 'Producto creado exitosamente.')
                ->with('icono', 'success');
        }

        // EDITAR
        if ($request->input('accion') == "2") {

            $producto = Producto::findOrFail($request->id);

            // 🚫 Si el producto ya fue usado en una compra, no se edita
            if ($producto->detalle_compras()->exists()) {
                return redirect()->back()
                    ->with('mensaje', 'Este producto ya está asociado a una compra y no puede ser editado.')
                    ->with('icono', 'warning');
            }

            $request->validate([
                'categoria_id' => 'required', 
                'nombre' => 'required',
                'descripcion' => 'required',
                'unidad' => 'required'
            ]);

            $producto->categoria_id = $request->categoria_id;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->unidad = $request->unidad;
            $producto->estado = true;
            $producto->save();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'mensaje' => 'Producto actualizado exitosamente.',
                    'producto' => $producto
                ]);
            }

            return redirect()->route('productos.index')
                ->with('mensaje', 'Producto actualizado exitosamente.')
                ->with('icono', 'success');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id); 
        return view('admin.productos.show', compact('producto')); 
    }
   public function data($id, $action = 'edit') 
    {
        $producto = Producto::findOrFail($id); 
        return response()->json([
            'producto' => $producto,
            'action' => $action
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id) 
    { 
        $producto = Producto::findOrFail($id);

        // 🚫 Si el producto ya fue usado en una compra, no se edita
        if ($producto->detalle_compras()->exists()) {
            return redirect()->back()
                ->with('mensaje', 'Este producto ya está asociado a una compra y no puede ser editado.')
                ->with('icono', 'warning');
        }

        $request->validate([
            'categoria_id' => 'required', 
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidad' => 'required'
        ]);

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

    public function listarAjax()
    {
        $productos = Producto::with('categoria')
            ->where('estado', true)
            ->orderBy('id', 'desc')->get(); 

        return response()->json($productos);
    }

}
