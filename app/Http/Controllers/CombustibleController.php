<?php

namespace App\Http\Controllers;

use App\Models\Combustible;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class CombustibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combustibles = Combustible::paginate(10); 
       return view('admin.combustibles.index', compact('combustibles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehiculos = Vehiculo::all();
        $empleados = Empleado::all(); 
        $users = User::all(); 
        return view('admin.combustibles.create', compact('vehiculos', 'empleados', 'users')); 
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
    public function show(combustible $combustible)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(combustible $combustible)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, combustible $combustible)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(combustible $combustible)
    {
        //
    }
}
