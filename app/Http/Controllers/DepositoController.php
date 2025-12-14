<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depositos = Deposito::all();
        return view('admin.depositos.index', compact('depositos'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $deposito = Deposito::findOrFail($id);
        $search = $request->input('search');

        // Traemos productos del depósito con relación pivot
        $productos = DB::table('deposito_producto as dp')
            ->join('productos as p', 'p.id', '=', 'dp.producto_id')
            ->leftJoin('detalle_compras as dc', 'dc.id', '=', 'dp.detalle_compra_id')
            ->leftJoin('compras as c', 'c.id', '=', 'dc.compra_id')
            ->select(
                'p.nombre',
                'p.descripcion',
                'dp.cantidad_asignada',
                'dp.stock',
                'dc.precio',
                'c.fecha_orden',
                'c.id as compra_id',
                // Subtotal basado en stock actual
                DB::raw('(dp.stock * COALESCE(dc.precio, 0)) as subtotal_real')
            )
            ->where('dp.deposito_id', $deposito->id)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('p.nombre', 'LIKE', "%{$search}%")
                        ->orWhere('p.descripcion', 'LIKE', "%{$search}%")
                        ->orWhere('dp.cantidad_asignada', 'LIKE', "%{$search}%")
                        ->orWhere('dp.stock', 'LIKE', "%{$search}%")
                        ->orWhere('dc.precio', 'LIKE', "%{$search}%")
                        ->orWhere(DB::raw('(dp.stock * COALESCE(dc.precio, 0))'), 'LIKE', "%{$search}%")
                        ->orWhere('c.fecha_orden', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('c.fecha_orden', 'desc')
            ->paginate(10);

        // Total general usando stock
        $totalGeneral = DB::table('deposito_producto as dp')
            ->leftJoin('detalle_compras as dc', 'dc.id', '=', 'dp.detalle_compra_id')
            ->where('dp.deposito_id', $deposito->id)
            ->selectRaw('SUM(dp.stock * COALESCE(dc.precio, 0)) as total')
            ->value('total');

        return view('admin.depositos.show', compact('deposito', 'productos', 'totalGeneral', 'search'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
