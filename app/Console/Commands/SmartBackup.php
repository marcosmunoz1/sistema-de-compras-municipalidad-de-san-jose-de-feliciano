<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Spatie\Backup\Tasks\Backup\BackupJob;
use Exception;
use ZipArchive;

class SmartBackup extends Command
{
    protected $signature = 'backup:smart {--only-db : Solo respaldar base de datos}';
    
    protected $description = 'Ejecuta un backup inteligente con manejo de errores y retención del backup anterior';

    public function handle()
    {
        $this->info('🔄 Iniciando backup inteligente del Sistema Municipal...');
        $startTime = now();
        
        try {
            $previousBackups = $this->getPreviousBackups();
            $this->info("📦 Backups anteriores encontrados: " . count($previousBackups));
            
            $onlyDb = $this->option('only-db');
            $backupType = $onlyDb ? 'solo base de datos' : 'completo (DB + archivos)';
            $this->info("📋 Tipo de backup: {$backupType}");
            
            $this->info('⏳ Creando nuevo backup...');
            
            $command = $onlyDb ? 'backup:run --only-db' : 'backup:run';
            $exitCode = Artisan::call($command);
            $output = Artisan::output();
            
            if ($exitCode !== 0) {
                Log::error('Backup output: ' . $output);
                throw new Exception('El comando de backup falló con código: ' . $exitCode . ' | Output: ' . trim($output));
            }
            
            $newBackup = $this->getLatestBackup();
            
            if (!$newBackup) {
                throw new Exception('No se pudo encontrar el backup recién creado');
            }
            
            $this->info("✅ Backup creado: {$newBackup['name']}");
            $this->info("📊 Tamaño: " . $this->formatBytes($newBackup['size']));
            
            if (!$this->verifyBackupIntegrity($newBackup['path'])) {
                throw new Exception('El archivo de backup está corrupto o no es válido');
            }
            
            $this->info('✅ Integridad del backup verificada');
            
            $this->syncToExternalDestinations($newBackup);
            
            $this->info('🧹 Limpiando backups antiguos según política de retención...');
            try {
                Artisan::call('backup:clean');
            } catch (\Exception $e) {
                $this->warn('⚠️ No se pudo ejecutar la limpieza automática: ' . $e->getMessage());
            }
            
            $duration = now()->diffInSeconds($startTime);
            $this->info("✅ Backup completado exitosamente en {$duration} segundos");
            
            $this->sendSuccessNotification($newBackup, $duration, $backupType);
            
            if (function_exists('activity')) {
                activity()
                    ->causedBy(auth()->check() ? auth()->user() : null)
                    ->withProperties([
                        'backup_name' => $newBackup['name'],
                        'backup_size' => $newBackup['size'],
                        'backup_type' => $backupType,
                        'duration' => $duration,
                    ])
                    ->log('Backup ejecutado exitosamente');
            }
            
            return 0;
            
        } catch (Exception $e) {
            $duration = now()->diffInSeconds($startTime);
            
            $this->error('❌ Error en backup: ' . $e->getMessage());
            
            if (!empty($previousBackups)) {
                $this->info('🛡️ Backup anterior mantenido intacto:');
                foreach ($previousBackups as $backup) {
                    $this->info("   - {$backup['name']} (" . $this->formatBytes($backup['size']) . ")");
                }
            } else {
                $this->warn('⚠️ No hay backups anteriores disponibles');
            }
            
            $this->cleanupFailedBackup();
            
            $this->sendErrorNotification($e, $previousBackups, $duration);
            
            Log::error('Backup falló', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'previous_backups' => count($previousBackups),
                'duration' => $duration,
            ]);
            
            if (function_exists('activity')) {
                activity()
                    ->causedBy(auth()->check() ? auth()->user() : null)
                    ->withProperties([
                        'error' => $e->getMessage(),
                        'previous_backups_count' => count($previousBackups),
                    ])
                    ->log('Backup falló');
            }
            
            return 1;
        }
    }
    
    protected function getPreviousBackups(): array
    {
        $backups = [];
        $disk = Storage::disk('backups');
        
        $appName = config('backup.backup.name');
        $backupPath = $appName;
        
        if (!$disk->exists($backupPath)) {
            return $backups;
        }
        
        $files = $disk->files($backupPath);
        
        foreach ($files as $file) {
            if (str_ends_with($file, '.zip')) {
                $backups[] = [
                    'name' => basename($file),
                    'path' => $disk->path($file),
                    'size' => $disk->size($file),
                    'modified' => $disk->lastModified($file),
                ];
            }
        }
        
        usort($backups, fn($a, $b) => $b['modified'] <=> $a['modified']);
        
        return $backups;
    }
    
    protected function getLatestBackup(): ?array
    {
        $backups = $this->getPreviousBackups();
        return $backups[0] ?? null;
    }
    
    protected function verifyBackupIntegrity(string $path): bool
    {
        if (!file_exists($path)) {
            return false;
        }
        
        if (filesize($path) < 1024) {
            return false;
        }
        
        $zip = new ZipArchive();
        $result = $zip->open($path, ZipArchive::CHECKCONS);
        
        if ($result !== true) {
            return false;
        }
        
        $numFiles = $zip->numFiles;
        $zip->close();
        
        return $numFiles > 0;
    }
    
    protected function syncToExternalDestinations(array $backup): void
    {
        // Usar los destinos de sincronización separados (no los primarios del backup)
        $destinations = config('backup.backup.sync_disks', []);
        
        if (empty($destinations)) {
            $this->info('ℹ️ No hay destinos externos configurados');
            return;
        }
        
        $successCount = 0;
        
        foreach ($destinations as $destination) {
            try {
                if (!config("filesystems.disks.{$destination}")) {
                    $this->warn("⚠️ Destino '{$destination}' no configurado, omitiendo...");
                    continue;
                }
                
                $this->info("☁️ Sincronizando con {$destination}...");
                
                // Verificar que el archivo local existe
                if (!file_exists($backup['path'])) {
                    $this->warn("⚠️ Archivo de backup no encontrado: {$backup['path']}");
                    continue;
                }
                
                $fileSize = filesize($backup['path']);
                $this->info("   📁 Archivo: {$backup['name']} (" . $this->formatBytes($fileSize) . ")");
                
                $disk = Storage::disk($destination);
                
                // Usar stream para archivos grandes en vez de cargar todo en memoria
                $stream = fopen($backup['path'], 'r');
                
                if ($stream === false) {
                    $this->warn("⚠️ No se pudo abrir el archivo de backup para lectura");
                    continue;
                }
                
                $result = $disk->put($backup['name'], $stream);
                
                if (is_resource($stream)) {
                    fclose($stream);
                }
                
                if ($result === false) {
                    $this->error("❌ Falló la subida a {$destination} (put() retornó false)");
                    Log::error("Fallo sincronización con {$destination}", [
                        'backup' => $backup['name'],
                        'file_size' => $fileSize,
                        'reason' => 'put() returned false - posible token expirado o error de conexión',
                    ]);
                    continue;
                }
                
                $this->info("✅ Sincronizado con {$destination} -> {$backup['name']}");
                $successCount++;
                
            } catch (Exception $e) {
                $this->warn("⚠️ Error al sincronizar con {$destination}: " . $e->getMessage());
                Log::warning("Fallo sincronización con {$destination}", [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'backup' => $backup['name'],
                ]);
            }
        }
        
        if ($successCount > 0) {
            $this->info("✅ Sincronizado con {$successCount} destino(s) externo(s)");
        } else if (!empty($destinations)) {
            $this->warn("⚠️ No se pudo sincronizar con ningún destino externo");
        }
    }
    
    protected function cleanupFailedBackup(): void
    {
        try {
            $tempDir = storage_path('app/backup-temp');
            if (is_dir($tempDir)) {
                $files = glob($tempDir . '/*');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
            }
        } catch (Exception $e) {
            Log::warning('No se pudo limpiar archivos temporales: ' . $e->getMessage());
        }
    }
    
    protected function sendSuccessNotification(array $backup, int $duration, string $type): void
    {
        try {
            $backupCount = count($this->getPreviousBackups());
            $totalSize = array_sum(array_column($this->getPreviousBackups(), 'size'));
            
            Log::info('Backup exitoso', [
                'backup_name' => $backup['name'],
                'backup_size' => $backup['size'],
                'backup_type' => $type,
                'duration' => $duration,
                'total_backups' => $backupCount,
                'total_size' => $totalSize,
            ]);
            
        } catch (Exception $e) {
            Log::warning('No se pudo enviar notificación de éxito: ' . $e->getMessage());
        }
    }
    
    protected function sendErrorNotification(Exception $error, array $previousBackups, int $duration): void
    {
        try {
            Log::error('Backup falló - Notificación', [
                'error' => $error->getMessage(),
                'previous_backups_count' => count($previousBackups),
                'duration' => $duration,
                'timestamp' => now()->toDateTimeString(),
            ]);
            
        } catch (Exception $e) {
            Log::critical('No se pudo enviar notificación de error: ' . $e->getMessage());
        }
    }
    
    protected function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        
        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
