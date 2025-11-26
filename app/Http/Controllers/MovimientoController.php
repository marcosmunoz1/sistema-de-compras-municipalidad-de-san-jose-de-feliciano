<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use App\Models\Movimiento;
use App\Models\Obra;
use App\Models\Producto;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Reconocer tipo de movimiento por texto
        $tipoBuscado = null;

        if ($search !== null) {
            $s = strtolower($search);

            if (in_array($s, ['entrada', 'salida', 'transferencia'])) {
                $tipoBuscado = $s;
            }
        }

        $movimientos = Movimiento::with(['producto', 'origen', 'destino'])
            ->where(function ($query) use ($search, $tipoBuscado) {

                // --- Buscar por tipo ---
                if (!is_null($tipoBuscado)) {
                    $query->where('tipo', $tipoBuscado);
                }

                // --- Campos propios de movimiento ---
                $query->orWhere('cantidad', 'LIKE', "%{$search}%")
                    ->orWhere('fecha', 'LIKE', "%{$search}%")
                    ->orWhere('observacion', 'LIKE', "%{$search}%");

                // --- Producto ---
                $query->orWhereHas('producto', function ($q) use ($search) {
                    $q->where('nombre', 'LIKE', "%{$search}%");
                });

                // --- Buscar por texto en tipo de origen/destino (no muy útil, pero lo dejé) ---
                $query->orWhere('origen_tipo', 'LIKE', "%{$search}%")
                    ->orWhere('destino_tipo', 'LIKE', "%{$search}%");

                // --- ORIGEN: si es VEHÍCULO ---
                $query->orWhereHasMorph(
                    'origen',
                    Vehiculo::class,
                    function ($m) use ($search) {
                        $m->where('patente', 'LIKE', "%{$search}%")
                            ->orWhere('modelo', 'LIKE', "%{$search}%")
                            ->orWhere('motor', 'LIKE', "%{$search}%");
                    }
                );

                // --- DESTINO: si es VEHÍCULO ---
                $query->orWhereHasMorph(
                    'destino',
                    Vehiculo::class,
                    function ($m) use ($search) {
                        $m->where('patente', 'LIKE', "%{$search}%")
                            ->orWhere('modelo', 'LIKE', "%{$search}%")
                            ->orWhere('motor', 'LIKE', "%{$search}%");
                    }
                );

                // --- ORIGEN: buscar por nombre si es Obra o Depósito ---
                $query->orWhereHasMorph(
                    'origen',
                    [Deposito::class, Obra::class],
                    function ($m) use ($search) {
                        $m->where('nombre', 'LIKE', "%{$search}%");
                    }
                );

                // --- DESTINO: igual que origen ---
                $query->orWhereHasMorph(
                    'destino',
                    [Deposito::class, Obra::class],
                    function ($m) use ($search) {
                        $m->where('nombre', 'LIKE', "%{$search}%");
                    }
                );

            })
            ->orderBy('fecha', 'desc')
            ->paginate(10);

        return view('admin.movimientos.index', compact('movimientos'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $depositos = Deposito::all();
        $vehiculos = Vehiculo::all();
        $obras = Obra::all();
        return view('admin.movimientos.create', compact('productos','depositos','vehiculos','obras'));
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
    public function show(Movimiento $movimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimiento $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimiento $movimiento)
    {
        //
    }
}
