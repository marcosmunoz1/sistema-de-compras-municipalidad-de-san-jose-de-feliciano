<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;
use ZipArchive;

class BackupController extends Controller
{
    public function index()
    {
        $allBackups = $this->getBackupsList();
        $stats = $this->getBackupStats($allBackups);
        
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        
        $backups = new \Illuminate\Pagination\LengthAwarePaginator(
            array_slice($allBackups, $offset, $perPage),
            count($allBackups),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        
        return view('admin.backups.index', compact('backups', 'stats'));
    }

    public function create(Request $request)
    {
        try {
            $onlyDb = $request->boolean('only_db');
            
            if (auth()->check()) {
                activity()
                    ->causedBy(auth()->user())
                    ->withProperties(['type' => $onlyDb ? 'database' : 'full'])
                    ->log('Backup manual iniciado');
            }
            
            $command = $onlyDb ? 'backup:smart --only-db' : 'backup:smart';
            
            $exitCode = Artisan::call($command);
            $output = Artisan::output();
            
            // Log para debugging
            Log::info('Backup manual ejecutado', [
                'command' => $command,
                'exit_code' => $exitCode,
                'output' => $output,
            ]);
            
            // Si el código de salida es 0, el backup fue exitoso
            if ($exitCode === 0) {
                return redirect()->route('backups.index')
                     ->with('mensaje', 'Backups creado exitosamente')
                     ->with('icono', 'success'); 
            } else {
                return redirect()->route('backups.index')
                     ->with('mensaje', 'Backups falló con código de salida: ' . $exitCode)
                     ->with('icono', 'error'); 
            }
            
        } catch (\Exception $e) {
            Log::error('Error al ejecutar backup manual', [
                'error' => $e->getMessage(),
                'user' => auth()->check() ? auth()->id() : null,
            ]);
            
            return redirect()->route('backups.index')
                ->with('mensaje', 'Error al ejecutar backup: ' . $e->getMessage())
                ->with('icono', 'error'); 
        }
    }

    public function download($filename)
    {
        try {
            $disk = Storage::disk('backups');
            $appName = config('backup.backup.name');
            $filePath = $appName . '/' . $filename;
            
            if (!$disk->exists($filePath)) {
                abort(404, 'Backup no encontrado');
            }
            
            if (auth()->check()) {
                activity()
                    ->causedBy(auth()->user())
                    ->withProperties(['backup' => $filename])
                    ->log('Backup descargado');
            }
            
            return $disk->download($filePath);
            
        } catch (\Exception $e) {
            Log::error('Error al descargar backup', [
                'error' => $e->getMessage(),
                'file' => $filename,
                'user' => auth()->id(),
            ]);
            
            return redirect()->route('backups.index')
                ->with('mensaje', 'Error al descargar backup: ' . $e->getMessage())
                ->with('icono', 'error'); 
        }
    }

    public function delete($filename)
    {
        try {
            $disk = Storage::disk('backups');
            $appName = config('backup.backup.name');
            $filePath = $appName . '/' . $filename;
            
            if (!$disk->exists($filePath)) {
                abort(404, 'Backup no encontrado');
            }
            
            $disk->delete($filePath);
            
            if (auth()->check()) {
                activity()
                    ->causedBy(auth()->user())
                    ->withProperties(['backup' => $filename])
                    ->log('Backup eliminado');
            }
            
            return redirect()->route('backups.index')
                ->with('mensaje', 'Backups eliminado exitosamente')
                ->with('icono', 'success'); 
            
        } catch (\Exception $e) {
            Log::error('Error al eliminar backup', [
                'error' => $e->getMessage(),
                'file' => $filename,
                'user' => auth()->id(),
            ]);
            
            return redirect()->route('backups.index')
                ->with('mensaje', 'Error al eliminar backup: ' . $e->getMessage())
                ->with('icono', 'error'); 
        }
    }

    public function verify($filename)
    {
        try {
            $disk = Storage::disk('backups');
            $appName = config('backup.backup.name');
            $filePath = $appName . '/' . $filename;
            
            if (!$disk->exists($filePath)) {
                abort(404, 'Backup no encontrado');
            }
            
            $path = $disk->path($filePath);
            $isValid = $this->verifyBackupIntegrity($path);
            
            if (auth()->check()) {
                activity()
                    ->causedBy(auth()->user())
                    ->withProperties([
                        'backup' => $filename,
                        'valid' => $isValid,
                    ])
                    ->log('Backup verificado');
            }
            
            if ($isValid) {
                return redirect()->route('backups.index')
                    ->with('mensaje', 'El backup es válido y está en buen estado')
                    ->with('icono', 'success');
            } else {
                return redirect()->route('backups.index')
                    ->with('mensanja', 'El backup está corrupto o no es válido')
                    ->with('icono', 'error'); 
            }
            
        } catch (\Exception $e) {
            Log::error('Error al verificar backup', [
                'error' => $e->getMessage(),
                'file' => $filename,
                'user' => auth()->id(),
            ]);
            
            return redirect()->route('backups.index')
                ->with('mensaje', 'Error al verificar backup: ' . $e->getMessage())
                ->with('icono', 'error'); 
        }
    }

    protected function getBackupsList(): array
    {
        $backups = [];
        
        try {
            $disk = Storage::disk('backups');
            
            $appName = config('backup.backup.name');
            $backupPath = $appName;
            
            if (!$disk->exists($backupPath)) {
                return $backups;
            }
            
            $files = $disk->files($backupPath);
            
            foreach ($files as $file) {
                if (str_ends_with($file, '.zip')) {
                    try {
                        $backups[] = [
                            'name' => basename($file),
                            'size' => $disk->size($file),
                            'modified' => $disk->lastModified($file),
                            'path' => $disk->path($file),
                        ];
                    } catch (\Exception $e) {
                        Log::warning('Error al obtener información del backup', [
                            'file' => $file,
                            'error' => $e->getMessage(),
                        ]);
                        
                        $backups[] = [
                            'name' => basename($file),
                            'size' => 0,
                            'modified' => time(),
                            'path' => $disk->path($file),
                        ];
                    }
                }
            }
            
            usort($backups, fn($a, $b) => $b['modified'] <=> $a['modified']);
            
        } catch (\Exception $e) {
            Log::error('Error al listar backups', [
                'error' => $e->getMessage(),
            ]);
        }
        
        return $backups;
    }

    protected function getBackupStats(array $backups): array
    {
        $totalSize = array_sum(array_column($backups, 'size'));
        $totalCount = count($backups);
        
        $oldest = $totalCount > 0 ? end($backups)['modified'] : null;
        $newest = $totalCount > 0 ? $backups[0]['modified'] : null;
        
        return [
            'total_count' => $totalCount,
            'total_size' => $totalSize,
            'total_size_formatted' => $this->formatBytes($totalSize),
            'oldest' => $oldest,
            'newest' => $newest,
        ];
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
