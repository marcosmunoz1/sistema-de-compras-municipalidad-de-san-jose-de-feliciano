<?php

namespace App\Http\Controllers;

use App\Models\Combustible;
use App\Models\Empleado;
use App\Models\Tipo_combustibles;
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
        $tipos_combustibles = Tipo_combustibles::all();  
        $combustibles = Combustible::paginate(10);  
        return view('admin.combustibles.index', compact('combustibles', 'tipos_combustibles')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $tipo_combustible = Tipo_combustibles::all();  
        $vehiculos = Vehiculo::all();
        $empleados = Empleado::all(); 
        $users = User::all(); 
        return view('admin.combustibles.create', compact('vehiculos', 'empleados', 'users','tipo_combustible'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 

        /* return response()->json($request->all());  */
        
        $request->validate([
            'vehiculo_id' => 'required',
            'empleado_id' => 'required',
            'user_id' => 'required',
            'codigo' => 'required|unique:combustibles,codigo',
            'fecha' => 'required',
            'litros' => 'required|numeric',
            'precio' => 'required|numeric',
            'combustible' => 'required',
            'estacion' => 'required',
            'tipo_de_pago' => 'required',
            'observaciones' => 'required' 
        ]); 
        $monto = $request->litros * $request->precio; 
        
        $combustible = Combustible::create([ 
            'vehiculo_id' => $request->vehiculo_id,
            'empleado_id' => $request->empleado_id,
            'user_id' => $request->user_id,
            'codigo' => $request->codigo,
            'litros' => $request->litros,
            'tipo' => $request->combustible, 
            'precio' => $request->precio,
            'estacion' => $request->estacion, 
            'fecha' => $request->fecha,
            'monto' => $monto,
            'tipo_de_pago' => $request->tipo_de_pago,
            'observaciones' => $request->observaciones,
            'estado' => true, 
        ]);

        return redirect()->route('combustibles.index')
        ->with('mensaje', 'Combustible creado exitosamente')
        ->with('icono', 'success'); 
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
    public function updatePrices(Request $request){   
        /* return response()->json($request->all());  */ 
     
         $request->validate([ 
            'precio' => 'required|numeric|min:0'
        ]);
        
        $tipo_combustible = Tipo_combustibles::findOrFail($request->id);  
        $tipo_combustible->valor = $request->precio; 
        $tipo_combustible->descripcion = $request->descripcion;
        $tipo_combustible->save();   
          
        
         return redirect()->route('combustibles.index')
        ->with('mensaje', 'Combustible Actualizado exitosamente')
        ->with('icono', 'success');  
    }
} 
