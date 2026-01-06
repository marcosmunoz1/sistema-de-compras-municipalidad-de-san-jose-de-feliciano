<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;        
use App\Models\Combustible;
use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Crypt;

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
       $compra = Compra::findOrFail($id); 
       $pdf = PDF::loadView('pdf.orden-compra', compact('compra')); 
       return $pdf->stream('orden_compra_' . $id . '.pdf');  
   }

   public function previewOrdenCompra($id)
   {
       $compra = Compra::with(['proveedor', 'empleado', 'detalle_compras.producto'])->findOrFail($id);
       $pdf = PDF::loadView('pdf.orden-compra', compact('compra'));
       return $pdf->stream('orden_compra_' . $compra->nr_orden . '.pdf');
   }

   public function downloadOrdenCompra($id)
   {
       $compra = Compra::with(['proveedor', 'empleado', 'detalle_compras.producto'])->findOrFail($id);
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
}
