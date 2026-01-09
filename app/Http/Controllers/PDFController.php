<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;        
use App\Models\Combustible;
use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class PDFController extends Controller
{
   public function PdfOrdenCarga($id) 
   {   
       $id = Crypt::decrypt($id); 
       $combustible = Combustible::findOrFail($id);
       $pdf = PDF::loadView('pdf.orden-carga', compact('combustible')); 
       return $pdf->stream('orden_carga_' . $id . '.pdf');  
   }
   public function PdfOrdenCompra($id) 
   {
       $compra = Compra::with(['usuario'])->findOrFail($id);
       $pdf = PDF::loadView('pdf.orden-compra', compact('compra')); 
       return $pdf->stream('orden_compra_' . $id . '.pdf');  
   }

   public function previewOrdenCompra($id)
   {
       $compra = Compra::with(['proveedor', 'empleado', 'detalle_compras.producto', 'usuario'])->findOrFail($id);
       
       Log::info('Usuario creador de compra en PDF', [
           'compra_id' => $compra->id,
           'usuario_id' => $compra->usuario ? $compra->usuario->id : null,
           'usuario_nombre' => $compra->usuario ? $compra->usuario->name : null,
           'tiene_firma' => $compra->usuario && $compra->usuario->firma ? true : false,
           'ruta_firma' => $compra->usuario ? $compra->usuario->firma : null
       ]);
       
       $pdf = PDF::loadView('pdf.orden-compra', compact('compra'));
       return $pdf->stream('orden_compra_' . $compra->nr_orden . '.pdf');
   }

   public function downloadOrdenCompra($id)
   {
       $compra = Compra::with(['proveedor', 'empleado', 'detalle_compras.producto', 'usuario'])->findOrFail($id);
       $pdf = PDF::loadView('pdf.orden-compra', compact('compra'));
       return $pdf->download('orden_compra_' . $compra->nr_orden . '.pdf');
   }

   public function previewOrdenCarga($id)
   {
       $combustible = Combustible::with(['empleado', 'destino'])->findOrFail($id);
       $pdf = PDF::loadView('pdf.orden-carga', compact('combustible'));
       return $pdf->stream('orden_carga_' . $combustible->codigo . '.pdf');
   }

   public function downloadOrdenCarga($id)
   {
       $combustible = Combustible::with(['empleado', 'destino'])->findOrFail($id);
       $pdf = PDF::loadView('pdf.orden-carga', compact('combustible'));
       return $pdf->download('orden_carga_' . $combustible->codigo . '.pdf');
   }

   public function previewReporteCompras()
   {
       $compras = Compra::with(['proveedor', 'empleado', 'destino', 'detalle_compras'])
           ->orderBy('fecha_orden', 'desc')
           ->get();
       
       $pdf = PDF::loadView('pdf.reporte-compras', compact('compras'))
           ->setPaper('a4', 'landscape');
       
       return $pdf->stream('reporte_compras_' . now()->format('Y-m-d') . '.pdf');
   }

   public function htmlReporteCompras()
   {
       $compras = Compra::with(['proveedor', 'empleado', 'destino', 'detalle_compras'])
           ->orderBy('fecha_orden', 'desc')
           ->get();
       
       return view('pdf.reporte-compras', compact('compras'));
   }

   public function downloadReporteCompras()
   {
       $compras = Compra::with(['proveedor', 'empleado', 'destino', 'detalle_compras'])
           ->orderBy('fecha_orden', 'desc')
           ->get();
       
       $pdf = PDF::loadView('pdf.reporte-compras', compact('compras'))
           ->setPaper('a4', 'landscape');
       
       return $pdf->download('reporte_compras_' . now()->format('Y-m-d') . '.pdf');
   }
}
