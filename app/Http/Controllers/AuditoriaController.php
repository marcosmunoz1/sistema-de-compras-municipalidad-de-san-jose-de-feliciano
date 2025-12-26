<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Crypt;

class AuditoriaController extends Controller
{
    public function index(Request $request)
    {
        $query = Activity::with('causer', 'subject')
            ->orderBy('created_at', 'desc');

        if ($request->filled('usuario')) {
            $query->where('causer_id', $request->usuario);
        }

        if ($request->filled('modulo')) {
            $query->where('subject_type', $request->modulo);
        }

        if ($request->filled('accion')) {
            $query->where('event', $request->accion);
        }

        if ($request->filled('fecha_desde')) {
            $query->whereDate('created_at', '>=', $request->fecha_desde);
        }

        if ($request->filled('fecha_hasta')) {
            $query->whereDate('created_at', '<=', $request->fecha_hasta);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('description', 'like', "%{$search}%")
                  ->orWhere('subject_type', 'like', "%{$search}%")
                  ->orWhereHas('causer', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $actividades = $query->paginate(15)->withQueryString();

        $usuarios = \App\Models\User::orderBy('name')->get();
        
        $modulos = Activity::select('subject_type')
            ->distinct()
            ->whereNotNull('subject_type')
            ->pluck('subject_type')
            ->map(function($type) {
                return [
                    'value' => $type,
                    'label' => class_basename($type)
                ];
            });

        return view('admin.auditoria.index', compact('actividades', 'usuarios', 'modulos'));
    }

    public function show($id)
    {
        $id = Crypt::decryptString($id);
        $actividad = Activity::with('causer', 'subject')->findOrFail($id);
        
        return view('admin.auditoria.show', compact('actividad'));
    }
}
