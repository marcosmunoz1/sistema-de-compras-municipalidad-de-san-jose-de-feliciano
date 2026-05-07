<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Storage;

echo "=== Test de conexión a Google Drive ===\n\n";

try {
    echo "1. Intentando subir archivo de prueba...\n";
    $result = Storage::disk('google')->put('test_backup.txt', 'Hola desde Laravel - Test de Google Drive! - ' . date('Y-m-d H:i:s'));
    
    if ($result) {
        echo "   ✅ ÉXITO: Archivo subido a Google Drive!\n\n";
        
        echo "2. Verificando que el archivo existe...\n";
        $exists = Storage::disk('google')->exists('test_backup.txt');
        echo "   " . ($exists ? "✅ Archivo encontrado" : "⚠️ No se encontró el archivo") . "\n\n";
        
        echo "3. Eliminando archivo de prueba...\n";
        Storage::disk('google')->delete('test_backup.txt');
        echo "   ✅ Archivo de prueba eliminado\n\n";
        
        echo "🎉 Google Drive está configurado correctamente!\n";
    } else {
        echo "   ❌ FALLO: No se pudo subir el archivo\n";
    }
} catch (Exception $e) {
    echo "   ❌ ERROR: " . $e->getMessage() . "\n";
    echo "   Archivo: " . $e->getFile() . ":" . $e->getLine() . "\n";
}
