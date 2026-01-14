<?php

namespace App\Http\Controllers;

use App\Models\Proveedor; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {   $search = $request->get('search');  
        $query = Proveedor::withTrashed()->orderBy('id', 'desc');
        if ($search) {
            $query->where('empresa', 'like', "%{$search}%")
                  ->orWhere('nombre', 'like', "%{$search}%")
                  ->orWhere('razon_social', 'like', "%{$search}%")
                  ->orWhere('cuit', 'like', "%{$search}%"); 
        }
        $proveedores = $query->paginate(5)->withQueryString();
        return view('admin.proveedores.index', compact('proveedores')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
      return view('admin.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'localidad' => 'required|string|max:255', 
            'provincia' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'razon_social' => 'nullable|string|max:255',
            'cuit' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'celular' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'codigo_postal' => 'nullable|string|max:255',
            'direccion' => 'required|string|max:255'
        ]); 

        $provedor = new Proveedor();
        $provedor->localidad = $request->localidad;
        $provedor->provincia = $request->provincia;
        $provedor->pais = $request->pais;
        $provedor->empresa = $request->empresa;
        $provedor->nombre = $request->nombre;
        $provedor->razon_social = $request->razon_social;
        $provedor->cuit = $request->cuit;
        $provedor->telefono = $request->telefono;
        $provedor->celular = $request->celular;
        $provedor->email = $request->email;
        $provedor->codigo_postal = $request->codigo_postal;
        $provedor->direccion = $request->direccion;
        $provedor->observaciones = $request->observaciones; 
        $provedor->save();

        return redirect()->route('proveedores.index');  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        $id = Crypt::decrypt($id); 
        $proveedor = Proveedor::findOrFail($id);
        
        // Calcular total de compras de los últimos 12 meses
        $totalCompras12Meses = $proveedor->compras()
            ->where('created_at', '>=', now()->subMonths(12))
            ->sum('total');
        
        // Contar órdenes activas (compras pendientes o en proceso)
        // Ajusta el campo 'estado' según tu lógica de negocio
        $ordenesActivas = $proveedor->compras()
            ->whereIn('estado_compra', ['Pendiente de factura', 'en_proceso', 'aprobado']) 
            ->count();
        
        // Contar productos únicos comprados a este proveedor
        $productosCount = DB::table('detalle_compras')
            ->join('compras', 'detalle_compras.compra_id', '=', 'compras.id')
            ->where('compras.proveedor_id', $id)
            ->distinct('detalle_compras.producto_id')
            ->count('detalle_compras.producto_id');
        
        // Obtener las últimas 5 compras del proveedor con sus detalles
        $comprasRecientes = $proveedor->compras()
            ->with('detalle_compras.producto')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.proveedores.show', compact(
            'proveedor', 
            'totalCompras12Meses', 
            'ordenesActivas', 
            'productosCount',
            'comprasRecientes'
        )); 
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $id = Crypt::decrypt($id);
        $proveedor = Proveedor::findOrFail($id); 
        return view('admin.proveedores.edit', compact('proveedor'));   
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) 
    {
        $proveedor = Proveedor::findOrFail($id);
        if ($proveedor->compras()->exists()) {
            return redirect()->back()
                ->with('mensaje', 'Este proveedor ya esta asociado a una compra y no puede ser editado.')
                ->with('icono', 'warning');
        }
    
        $request->validate([
            'localidad' => 'required|string|max:255', 
            'provincia' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'razon_social' => 'nullable|string|max:255',
            'cuit' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'celular' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'codigo_postal' => 'nullable|string|max:255',
            'direccion' => 'required|string|max:255'
        ]); 
        $proveedor->localidad = $request->localidad;
        $proveedor->provincia = $request->provincia;
        $proveedor->pais = $request->pais;
        $proveedor->empresa = $request->empresa;
        $proveedor->nombre = $request->nombre;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->cuit = $request->cuit;
        $proveedor->telefono = $request->telefono;
        $proveedor->celular = $request->celular;
        $proveedor->email = $request->email;
        $proveedor->codigo_postal = $request->codigo_postal;
        $proveedor->direccion = $request->direccion;
        $proveedor->observaciones = $request->observaciones; 
        $proveedor->save();
        return redirect()->route('proveedores.index')
        ->with('mensaje', 'Proveedor actualizado correctamente')
        ->with('icono', 'success'); 
    }

    /**
     * Remove the specified resource from storage. 
     */
    public function destroy($id) 
    { 
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->estado = false; 
        $proveedor->save();
        $proveedor->delete();
        return redirect()->route('proveedores.index')
        ->with('mensaje', 'Proveedor eliminado correctamente')
        ->with('icono', 'success'); 
    }
     public function restore(string $id)
    {
        $proveedor = Proveedor::withTrashed()->find($id); 
        $proveedor->restore(); 
        $proveedor->estado = true;  
        $proveedor->save();  
        return redirect()->route('proveedores.index') 
        ->with('mensaje', 'Proveedor restaurado exitosamente')
        ->with('icono', 'success');
    }
} 
