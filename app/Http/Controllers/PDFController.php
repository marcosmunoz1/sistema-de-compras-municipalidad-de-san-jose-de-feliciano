<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;        
use App\Models\Combustible; 
 use Barryvdh\DomPDF\Facade\Pdf;  

class PDFController extends Controller
{
   public function PdfOrdenCarga($id) 
   {
       $combustible = Combustible::findOrFail($id);
       $pdf = PDF::loadView('pdf.orden-carga', compact('combustible')); 
       return $pdf->stream('orden_carga_' . $id . '.pdf');  
   }
}
