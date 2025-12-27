# Configuración de mysqldump para Backups

## Problema
El sistema de backups no puede encontrar `mysqldump.exe` porque no está en el PATH del sistema.

## Solución 1: Agregar al archivo .env (Recomendado)

Abre el archivo `.env` y agrega esta línea:

```env
DB_DUMP_PATH=C:\xampp\mysql\bin
```

Luego ejecuta:
```bash
php artisan config:clear
php artisan backup:run --only-db
```

## Solución 2: Agregar mysqldump al PATH del sistema (Permanente)

### Windows:

1. Presiona `Win + R` y escribe `sysdm.cpl`
2. Ve a la pestaña "Opciones avanzadas"
3. Click en "Variables de entorno"
4. En "Variables del sistema", busca `Path` y haz doble click
5. Click en "Nuevo" y agrega: `C:\xampp\mysql\bin`
6. Click "Aceptar" en todas las ventanas
7. **Reinicia PowerShell/CMD**
8. Verifica con: `mysqldump --version`

## Solución 3: Usar solo backups de archivos (Temporal)

Si solo quieres probar el sistema sin backups de base de datos:

Edita `config/backup.php` línea 26-28:

```php
'databases' => [
    // 'mysql',  // Comentar esta línea
],
```

Luego ejecuta:
```bash
php artisan config:clear
php artisan backup:run --only-files
```

## Verificar que funciona

Después de aplicar cualquier solución, ejecuta:

```bash
php artisan backup:run --only-db
```

Deberías ver:
```
Starting backup...
Dumping database laravel_sistema-talwind2...
Zipping 1 files and directories...
Successfully created backup...
```

## Ubicación de los backups

Los backups se guardan en:
```
storage/app/backups/
```

Puedes verificar con:
```bash
dir storage\app\backups
```
