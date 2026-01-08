<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OcrController extends Controller
{
    /**
     * Procesar imagen o PDF de factura con OCR.space API
     */
    public function procesarFactura(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:jpeg,png,jpg,gif,bmp,webp,pdf|max:5120', // Max 5MB
        ]);

        try {
            $apiKey = config('services.ocr_space.api_key');
            
            // Verificar que la API key esté configurada
            if (empty($apiKey) || $apiKey === 'helloworld') {
                return response()->json([
                    'success' => false,
                    'mensaje' => 'API Key no configurada. Agregá OCR_SPACE_API_KEY en tu archivo .env',
                    'error' => 'Obtené tu API key gratis en: https://ocr.space/ocrapi/freekey'
                ], 400);
            }

            $archivo = $request->file('archivo');
            $extension = strtolower($archivo->getClientOriginalExtension());
            $esPdf = $extension === 'pdf';
            
            // Preparar datos para la API
            $apiParams = [
                ['name' => 'apikey', 'contents' => $apiKey],
                ['name' => 'language', 'contents' => 'spa'],
                ['name' => 'isOverlayRequired', 'contents' => 'false'],
                ['name' => 'detectOrientation', 'contents' => 'true'],
                ['name' => 'scale', 'contents' => 'true'],
                ['name' => 'OCREngine', 'contents' => '2'],
            ];
            
            if ($esPdf) {
                // Para PDF, enviar como archivo
                $apiParams[] = ['name' => 'file', 'contents' => fopen($archivo->getRealPath(), 'r'), 'filename' => $archivo->getClientOriginalName()];
                $apiParams[] = ['name' => 'isCreateSearchablePdf', 'contents' => 'false'];
            } else {
                // Para imágenes, comprimir y enviar como base64
                $base64Image = $this->comprimirImagen($archivo);
                $apiParams[] = ['name' => 'base64Image', 'contents' => "data:image/jpeg;base64,{$base64Image}"];
            }

            // Llamar a OCR.space API
            $response = Http::asMultipart()
                ->timeout(90)
                ->post('https://api.ocr.space/parse/image', $apiParams);

            $result = $response->json();
            
            Log::info('OCR Response:', $result);

            // Verificar errores de la API
            if (isset($result['IsErroredOnProcessing']) && $result['IsErroredOnProcessing']) {
                return response()->json([
                    'success' => false,
                    'mensaje' => 'Error de OCR.space',
                    'error' => $result['ErrorMessage'][0] ?? 'Error desconocido en el procesamiento'
                ], 400);
            }

            if (isset($result['ParsedResults'][0]['ParsedText'])) {
                $textoOcr = $result['ParsedResults'][0]['ParsedText'];
                
                // Extraer productos del texto
                $productos = $this->extraerProductos($textoOcr);

                return response()->json([
                    'success' => true,
                    'texto_raw' => $textoOcr,
                    'productos' => $productos,
                ]);
            }

            return response()->json([
                'success' => false,
                'mensaje' => 'No se pudo extraer texto de la imagen. Intentá con una imagen más clara.',
                'error' => $result['ErrorMessage'][0] ?? 'La imagen no contiene texto legible'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Error OCR: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'mensaje' => 'Error al procesar la imagen.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Extraer productos del texto OCR
     * Formato esperado: CATEGORIA en línea con _ o -, luego NOMBRE, luego DESCRIPCION, luego UNIDAD
     */
    private function extraerProductos(string $texto): array
    {
        $productos = [];
        $lineas = explode("\n", $texto);
        
        // Limpiar líneas vacías y espacios
        $lineas = array_values(array_filter(array_map('trim', $lineas), function($l) {
            return !empty($l) && $l !== '_' && $l !== '-';
        }));
        
        $categoriaActual = '';
        $i = 0;
        
        while ($i < count($lineas)) {
            $linea = $lineas[$i];
            
            // Ignorar encabezados de tabla
            if (preg_match('/^(CATEGOR|NOMBRE|DESCRIPCI|UNIDAD|CANTIDAD|PRECIO|OVIDAD)/i', $linea)) {
                $i++;
                continue;
            }

            // Detectar línea de categoría (empieza con _ o -)
            if (preg_match('/^[_\-]\s*(.+)$/i', $linea, $matches)) {
                $categoriaActual = trim($matches[1]);
                $i++;
                
                // Después de categoría vienen: NOMBRE, DESCRIPCION (y opcionalmente UNIDAD)
                $nombre = isset($lineas[$i]) ? trim($lineas[$i]) : '';
                $descripcion = isset($lineas[$i + 1]) ? trim($lineas[$i + 1]) : '';
                $unidad = isset($lineas[$i + 2]) ? trim($lineas[$i + 2]) : 'Unidad';
                
                // Verificar que nombre no sea otra categoría ni encabezado
                if (!empty($nombre) && !preg_match('/^[_\-]/', $nombre) && !preg_match('/^(CATEGOR|NOMBRE|DESCRIPCI|UNIDAD)/i', $nombre)) {
                    
                    // Si descripcion parece otra categoría, usar valor por defecto
                    if (preg_match('/^[_\-]/', $descripcion)) {
                        $descripcion = 'Sin descripción';
                        $unidad = 'Unidad';
                    } else {
                        $i++; // Avanzar por nombre
                        
                        // Si unidad parece otra categoría, usar valor por defecto
                        if (preg_match('/^[_\-]/', $unidad) || preg_match('/^(CATEGOR|NOMBRE)/i', $unidad)) {
                            $unidad = 'Unidad';
                        } else if (!empty($descripcion) && !preg_match('/^(CATEGOR|NOMBRE)/i', $descripcion)) {
                            $i++; // Avanzar por descripcion
                        }
                    }
                    
                    $productos[] = [
                        'nombre' => $nombre,
                        'descripcion' => $descripcion !== 'Sin descripción' ? $descripcion : '',
                        'unidad' => $unidad,
                        'categoria_sugerida' => $categoriaActual,
                    ];
                }
                continue;
            }
            
            // Si no es categoría, puede ser un producto suelto
            if (preg_match('/^([A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\-]{2,})$/', $linea)) {
                $nombre = trim($linea);
                // Evitar palabras comunes que no son productos
                if (!preg_match('/^(BLA|UNIDAD|CANTIDAD|PRECIO|TOTAL|FECHA|FACTURA|NRO|NUM)$/i', $nombre)) {
                    $productos[] = [
                        'nombre' => $nombre,
                        'descripcion' => '',
                        'unidad' => 'Unidad',
                        'categoria_sugerida' => $categoriaActual,
                    ];
                }
            }
            
            $i++;
        }

        return $productos;
    }

    /**
     * Comprimir imagen para cumplir límite de 1MB de OCR.space
     */
    private function comprimirImagen($imagen): string
    {
        $maxSize = 900 * 1024; // 900KB para tener margen
        $path = $imagen->getRealPath();
        
        // Obtener info de la imagen
        $info = getimagesize($path);
        $mime = $info['mime'];
        
        // Crear recurso de imagen según el tipo
        switch ($mime) {
            case 'image/jpeg':
                $img = imagecreatefromjpeg($path);
                break;
            case 'image/png':
                $img = imagecreatefrompng($path);
                break;
            case 'image/gif':
                $img = imagecreatefromgif($path);
                break;
            case 'image/bmp':
                $img = imagecreatefrombmp($path);
                break;
            case 'image/webp':
                $img = imagecreatefromwebp($path);
                break;
            default:
                // Si no se puede procesar, devolver original
                return base64_encode(file_get_contents($path));
        }

        // Obtener dimensiones originales
        $width = imagesx($img);
        $height = imagesy($img);
        
        // Si el archivo ya es pequeño, devolverlo con calidad reducida
        $quality = 85;
        
        // Reducir dimensiones si es muy grande (máx 2000px de ancho)
        $maxWidth = 2000;
        if ($width > $maxWidth) {
            $ratio = $maxWidth / $width;
            $newWidth = $maxWidth;
            $newHeight = (int)($height * $ratio);
            
            $resized = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resized, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($img);
            $img = $resized;
        }
        
        // Comprimir iterativamente hasta que sea menor a maxSize
        do {
            ob_start();
            imagejpeg($img, null, $quality);
            $data = ob_get_clean();
            
            if (strlen($data) > $maxSize && $quality > 20) {
                $quality -= 10;
            } else {
                break;
            }
        } while ($quality > 20);
        
        imagedestroy($img);
        
        return base64_encode($data);
    }
}
