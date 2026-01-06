<?php

namespace App\Http\Controllers;

use App\Models\Combustible;
use App\Models\Empleado;
use App\Models\Tipo_combustibles;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CombustibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tipos_combustibles = Tipo_combustibles::all();
        $search = $request->get('search');

        $desde = $request->desde;
        $hasta = $request->hasta;

        // 🧠 Detectar si el search es una fecha DD/MM/YYYY
        $fechaFormateada = null;

        if (!empty($search)) {
            $formatos = ['d/m/Y', 'd-m-Y', 'Y-m-d'];

            foreach ($formatos as $formato) {
                try {
                    $fechaFormateada = \Carbon\Carbon::createFromFormat($formato, trim($search))
                        ->format('Y-m-d');
                    break;
                } catch (\Exception $e) {
                    // seguimos intentando
                }
            }
        }


        // QUERY BASE (UNO SOLO)
        $query = Combustible::with(['destino', 'empleado'])
            ->withTrashed()
            ->orderBy('id', 'desc');

        // Filtro por fechas
        if ($desde && $hasta && !$search) {
            $query->whereBetween('fecha', [$desde, $hasta]);
        }


        // Filtro de búsqueda
        if ($search) {
            $query->where(function ($q) use ($search, $fechaFormateada) {

                // 🔹 Fecha escrita (DD/MM/YYYY, Y-m-d, etc.)
                if ($fechaFormateada) {
                    $q->orWhereDate('fecha', $fechaFormateada);
                }

                // 🔹 Campos propios
                $q->orWhere('codigo', 'like', "%{$search}%")
                ->orWhere('estacion', 'like', "%{$search}%")

                // 🔹 Destino polimórfico
                ->orWhereHasMorph(
                    'destino',
                    [Vehiculo::class],
                    function ($d) use ($search) {
                        $d->where('marca', 'like', "%{$search}%")
                            ->orWhere('patente', 'like', "%{$search}%")
                            ->orWhere('modelo', 'like', "%{$search}%");
                    }
                )

                // 🔹 Empleado
                ->orWhereHas('empleado', function ($e) use ($search) {
                    $e->where('nombre', 'like', "%{$search}%");
                });
            });
        }


        // CLONAMOS para las cards
        $totalesQuery = clone $query;

        $totalMonto  = $totalesQuery->sum('monto');
        $totalLitros = $totalesQuery->sum('litros');
        $totalCargas = $totalesQuery->count();

        // TABLA + PAGINACIÓN
        $combustibles = $query->paginate(10)->withQueryString();

        return view('admin.combustibles.index', compact(
            'combustibles',
            'tipos_combustibles',
            'totalMonto',
            'totalLitros',
            'totalCargas'
        ));
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

        // return response()->json($request->all()); 
        
        $request->validate([
            'fecha' => 'required',
            'sub_cuenta' => 'required', 
            'destino_tipo' => 'required',
            'destino_id' => 'required', 
            'combustible' => 'required',
            'litros' => 'required|numeric',
            'precio' => 'required|numeric',
            'estacion' => 'required',
            'tipo_de_pago' => 'required',
            'observaciones' => 'required' 
        ]); 
         
      
        $lastOrder = Combustible::max('codigo');   
        $newOrder = $lastOrder ? $lastOrder + 1 : 13000;

        $codigo = str_pad($newOrder, 8, '0', STR_PAD_LEFT);
        $monto = $request->litros * $request->precio; 
        $user_id = Auth::id();

        DB::beginTransaction();
        try{ 
            Combustible::create([ 
            'empleado_id' => $request->empleado_id ?? null, 
            'user_id' => $user_id,  
            'codigo' =>  $codigo,
            'litros' => $request->litros, 
            'tipo' => $request->combustible,  
            'sub_cuenta' => $request->sub_cuenta, 
            'precio' => $request->precio,
            'estacion' => $request->estacion,  
            'fecha' => $request->fecha, 
            'destino_tipo' => modeloDestino($request->destino_tipo)['model'],           
            'destino_id' => $request->destino_id,    
            'monto' => $monto, 
            'tipo_de_pago' => $request->tipo_de_pago,
            'observaciones' => $request->observaciones,
            'estado' => true, 
            ]); 

            DB::commit();
            return redirect()->route('combustibles.index')
            ->with('mensaje', 'Combustible creado exitosamente')
            ->with('icono', 'success');
            
        } catch (\Exception $e) {
            DB::rollback();
            // Log the error for debugging
            \Illuminate\Support\Facades\Log::error('Error creating combustible: ' . $e->getMessage());
            \Illuminate\Support\Facades\Log::error('Error trace: ' . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Error al crear el combustible. Por favor intente nuevamente.');
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $id = Crypt::decrypt($id); 
        $combustible = Combustible::with('destino')->findOrFail($id); 
        return view('admin.combustibles.show', compact('combustible'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo_combustible = Tipo_combustibles::all();   
        $vehiculos = Vehiculo::all(); 
        $empleados = Empleado::all();  
        $users = User::all();  
        $combustible = Combustible::findOrFail($id);
        return view('admin.combustibles.edit', compact('combustible', 'tipo_combustible', 'vehiculos', 'empleados', 'users')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id) 
    { 
           
           $request->validate([ 
            'codigo' => 'required|unique:combustibles,codigo,' . $id,      
            'fecha' => 'required', 
            'user_id' => 'required', 
            'vehiculo_id' => 'required', 
            'empleado_id' => 'required',
            'combustible' => 'required', 
            'litros' => 'required|numeric',
            'precio' => 'required|numeric',
            'estacion' => 'required',
            'tipo_de_pago' => 'required', 
            'observaciones' => 'nullable|string|max:500'  
        ]); 
        
        $monto = $request->litros * $request->precio;  
        $combustible = Combustible::withTrashed()->findOrFail($id); 

        $combustible->vehiculo_id = $request->vehiculo_id; 
        $combustible->empleado_id = $request->empleado_id;
        $combustible->user_id = $request->user_id;
        $combustible->codigo = $request->codigo;
        $combustible->litros = $request->litros;
        $combustible->tipo = $request->combustible; 
        $combustible->precio = $request->precio;
        $combustible->estacion = $request->estacion;
        $combustible->fecha = $request->fecha;
        $combustible->monto = $monto;
        $combustible->tipo_de_pago = $request->tipo_de_pago;
        $combustible->observaciones = $request->observaciones;
        $combustible->save();
            
        
        return redirect()->route('combustibles.index') 
        ->with('mensaje', 'Combustible actualizado exitosamente')
        ->with('icono', 'success');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {  
        $combustible = Combustible::findOrFail($id); 

        // Marcar como inactiva
        $combustible->estado = false;
        $combustible->save();

        // Soft delete
        $combustible->delete();

        return redirect()->route('combustibles.index') 
        ->with('mensaje', 'Combustible eliminado y marcado como inactivo.') 
        ->with('icono', 'success');  
    }

    public function restore($id)
    { 
        $combustible = Combustible::withTrashed()->findOrFail($id);
        $combustible->restore();
        $combustible->estado = true;
        $combustible->save();
        
        return redirect()->route('combustibles.index') 
        ->with('mensaje', 'Combustible restaurado exitosamente.') 
        ->with('icono', 'success');  
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
