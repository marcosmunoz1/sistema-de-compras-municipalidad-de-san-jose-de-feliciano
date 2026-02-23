<?php

namespace App\Http\Controllers;

use App\Models\Detalle_compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Detalle_compra $detalle_compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detalle_compra $detalle_compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detalle_compra $detalle_compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {

            $detalle = Detalle_compra::findOrFail($id);

            $tipos = ['obra', 'deposito', 'vehiculo', 'equipo', 'destino'];

            foreach ($tipos as $tipo) {

                $config = modeloDestino($tipo);

                if ($config && Schema::hasTable($config['table'])) {

                    DB::table($config['table'])
                        ->where('detalle_compra_id', $detalle->id)
                        ->delete();
                }
            }

            $detalle->delete();
        });

        return redirect()
            ->back()
            ->with('mensaje', 'Producto eliminado correctamente')
            ->with('icono', 'success');
    }
}
