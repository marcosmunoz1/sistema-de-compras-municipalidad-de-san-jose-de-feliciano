# 🔐 Sistema de Backups - Sistema Municipal

## 📋 Descripción

Sistema completo de backups automáticos con retención inteligente, múltiples destinos (local, Google Drive, AWS S3) y gestión desde interfaz web.

## ✨ Características

- ✅ **2 Backups diarios automáticos**: 13:00 (solo DB) y 22:00 (completo)
- ✅ **Retención inteligente**: No elimina backup anterior hasta confirmar que el nuevo es exitoso
- ✅ **Múltiples destinos**: Local + Google Drive + AWS S3
- ✅ **Interfaz web**: Ver, descargar, verificar y ejecutar backups manualmente
- ✅ **Notificaciones**: Email automático en caso de éxito o fallo
- ✅ **Verificación de integridad**: Comprueba que los archivos ZIP no estén corruptos
- ✅ **Auditoría**: Registra todas las acciones en el log de actividad

## 📦 Instalación

### 1. Instalar Dependencias

```bash
composer install
```

Esto instalará:
- `spatie/laravel-backup` - Sistema de backups
- `aws/aws-sdk-php` - Cliente AWS S3
- `league/flysystem-aws-s3-v3` - Driver S3 para Laravel
- `masbug/flysystem-google-drive-ext` - Driver Google Drive

### 2. Publicar Configuración (Opcional)

Si necesitas personalizar más la configuración:

```bash
php artisan vendor:publish --provider="Spatie\Backup\BackupServiceProvider"
```

### 3. Crear Directorios

```bash
mkdir -p storage/app/backups
mkdir -p storage/app/backup-temp
```

### 4. Configurar Variables de Entorno

Agrega estas variables a tu archivo `.env`:

```env
# Configuración de Backups
BACKUP_MAIL_TO=admin@municipalidad.gob.ar
BACKUP_ARCHIVE_PASSWORD=

# Google Drive (Opcional)
GOOGLE_DRIVE_CLIENT_ID=tu-client-id.apps.googleusercontent.com
GOOGLE_DRIVE_CLIENT_SECRET=tu-client-secret
GOOGLE_DRIVE_REFRESH_TOKEN=tu-refresh-token
GOOGLE_DRIVE_FOLDER=

# AWS S3 (Opcional)
AWS_ACCESS_KEY_ID=tu-access-key
AWS_SECRET_ACCESS_KEY=tu-secret-key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=sistema-municipal-backups
AWS_USE_PATH_STYLE_ENDPOINT=false
```

### 5. Ejecutar Migraciones y Seeders

```bash
php artisan migrate
php artisan db:seed --class=PermissionSeeder
```

Esto creará los permisos:
- `backups-index` - Ver lista de backups
- `backups-create` - Ejecutar backups manualmente
- `backups-download` - Descargar backups
- `backups-verify` - Verificar integridad
- `backups-delete` - Eliminar backups

### 6. Configurar Cron (Servidor Linux)

Edita el crontab:

```bash
crontab -e
```

Agrega esta línea:

```cron
* * * * * cd /ruta/a/tu/proyecto && php artisan schedule:run >> /dev/null 2>&1
```

**Windows (Programador de Tareas):**
1. Abrir "Programador de tareas"
2. Crear tarea básica
3. Acción: Iniciar programa
4. Programa: `C:\xampp\php\php.exe`
5. Argumentos: `C:\xampp\htdocs\Sistema-talwind\artisan schedule:run`
6. Repetir cada: 1 minuto

## 🔧 Configuración de Destinos

### Google Drive

1. **Crear proyecto en Google Cloud Console**
   - Ir a: https://console.cloud.google.com
   - Crear nuevo proyecto
   - Habilitar "Google Drive API"

2. **Crear credenciales OAuth 2.0**
   - Ir a "Credenciales" > "Crear credenciales" > "ID de cliente OAuth"
   - Tipo: Aplicación web
   - URI de redirección: `http://localhost`
   - Copiar Client ID y Client Secret

3. **Obtener Refresh Token**

```bash
php artisan tinker
```

```php
$client = new \Google_Client();
$client->setClientId('tu-client-id');
$client->setClientSecret('tu-client-secret');
$client->setRedirectUri('http://localhost');
$client->setScopes([\Google_Service_Drive::DRIVE_FILE]);
$client->setAccessType('offline');
$client->setPrompt('consent');

echo $client->createAuthUrl();
// Abrir URL en navegador, autorizar y copiar el código

$token = $client->fetchAccessTokenWithAuthCode('codigo-obtenido');
echo $token['refresh_token']; // Copiar este token al .env
```

4. **Crear carpeta en Google Drive**
   - Crear carpeta "Backups Sistema Municipal"
   - Copiar ID de la carpeta desde la URL
   - Agregar ID al `.env` en `GOOGLE_DRIVE_FOLDER`

### AWS S3

1. **Crear cuenta AWS** (si no tienes)
   - Ir a: https://aws.amazon.com

2. **Crear bucket S3**
   - Ir a S3 Console
   - Crear bucket: `sistema-municipal-backups`
   - Región: `us-east-1` (o la que prefieras)
   - Bloquear acceso público: Activado

3. **Crear usuario IAM**
   - Ir a IAM Console
   - Crear usuario: `backup-user`
   - Permisos: `AmazonS3FullAccess` (o crear política personalizada)
   - Copiar Access Key ID y Secret Access Key

4. **Configurar en .env**
   - Agregar credenciales obtenidas

### Alternativa Económica: Backblaze B2

Backblaze B2 es más económico que AWS S3:

```env
AWS_ACCESS_KEY_ID=tu-application-key-id
AWS_SECRET_ACCESS_KEY=tu-application-key
AWS_DEFAULT_REGION=us-west-002
AWS_BUCKET=sistema-municipal-backups
AWS_ENDPOINT=https://s3.us-west-002.backblazeb2.com
AWS_USE_PATH_STYLE_ENDPOINT=false
```

## 🚀 Uso

### Comandos Artisan

```bash
# Backup completo (DB + archivos)
php artisan backup:smart

# Solo base de datos
php artisan backup:smart --only-db

# Ver estado de backups
php artisan backup:list

# Limpiar backups antiguos
php artisan backup:clean

# Monitorear salud de backups
php artisan backup:monitor
```

### Interfaz Web

Accede a: `http://tu-dominio.com/admin/backups`

**Funcionalidades:**
- Ver lista de todos los backups disponibles
- Ejecutar backup manual (DB o completo)
- Descargar backups
- Verificar integridad de backups
- Eliminar backups antiguos
- Ver estadísticas (total, espacio usado, último backup)

## 📅 Programación Automática

Los backups se ejecutan automáticamente:

| Hora  | Tipo              | Descripción                    |
|-------|-------------------|--------------------------------|
| 13:00 | Solo Base de Datos| Backup rápido de DB            |
| 22:00 | Completo          | DB + archivos del sistema      |

**Zona horaria:** America/Argentina/Buenos_Aires

## 🛡️ Política de Retención

El sistema mantiene backups según esta estrategia:

- **Hoy**: Todos los backups del día actual
- **Últimos 7 días**: 1 backup por día
- **Últimas 4 semanas**: 1 backup por semana
- **Últimos 12 meses**: 1 backup por mes
- **Últimos 5 años**: 1 backup por año

**Límite de espacio:** 5000 MB (5 GB)

## ⚠️ Manejo de Errores

### Si un backup falla:

1. ✅ El backup **anterior se mantiene intacto**
2. ✅ Se envía **notificación por email**
3. ✅ Se registra en **logs** (`storage/logs/laravel.log`)
4. ✅ Se registra en **auditoría** del sistema
5. ✅ El sistema **reintentará** en el próximo horario programado

### Tipos de errores comunes:

| Error | Causa | Solución |
|-------|-------|----------|
| No se puede conectar a MySQL | Base de datos caída | Verificar servicio MySQL |
| Espacio insuficiente | Disco lleno | Limpiar backups antiguos o ampliar disco |
| Error en Google Drive | Token expirado | Regenerar refresh token |
| Error en S3 | Credenciales inválidas | Verificar AWS credentials |

## 📊 Monitoreo

### Ver logs de backups:

```bash
tail -f storage/logs/laravel.log | grep -i backup
```

### Ver actividad de backups:

Accede a: `http://tu-dominio.com/admin/auditoria`

Filtra por: "Backup"

## 🔐 Seguridad

### Encriptar backups (Opcional)

Agrega una contraseña en `.env`:

```env
BACKUP_ARCHIVE_PASSWORD=tu-contraseña-segura
```

Los backups se encriptarán con esta contraseña.

### Permisos recomendados:

```bash
chmod 755 storage/app/backups
chmod 644 storage/app/backups/*.zip
```

## 🧪 Pruebas

### Probar backup manual:

```bash
php artisan backup:smart
```

### Verificar integridad:

```bash
php artisan backup:list
```

### Probar restauración:

```bash
# Descomprimir backup
unzip storage/app/backups/nombre-backup.zip -d /tmp/restore

# Restaurar base de datos
mysql -u usuario -p nombre_db < /tmp/restore/db-dumps/mysql-database.sql
```

## 📞 Soporte

Si tienes problemas:

1. Revisa los logs: `storage/logs/laravel.log`
2. Verifica configuración: `php artisan config:show backup`
3. Verifica permisos: `ls -la storage/app/backups`
4. Ejecuta diagnóstico: `php artisan backup:monitor`

## 📝 Notas Importantes

- ⚠️ **Nunca** elimines manualmente archivos de `storage/app/backups` sin usar la interfaz
- ⚠️ **Prueba** la restauración periódicamente para asegurar que los backups funcionan
- ⚠️ **Mantén** las credenciales de Google Drive y S3 seguras
- ⚠️ **Monitorea** el espacio en disco regularmente
- ⚠️ **Configura** notificaciones por email para estar al tanto de fallos

## 🎯 Recomendaciones

### Para Producción:

1. ✅ Configurar **al menos 2 destinos externos** (Google Drive + S3)
2. ✅ Habilitar **encriptación** de backups
3. ✅ Configurar **notificaciones por email**
4. ✅ Probar **restauración** mensualmente
5. ✅ Monitorear **espacio en disco**
6. ✅ Revisar **logs** semanalmente

### Costos Estimados:

| Servicio | Costo/mes (100GB) | Recomendado |
|----------|-------------------|-------------|
| Google Drive | $1.99 | ✅ Sí |
| AWS S3 | $2.30 | ✅ Sí |
| Backblaze B2 | $0.50 | ⭐ Mejor precio |
| Wasabi | $0.59 | ✅ Sí |

**Total recomendado:** $3-5/mes para máxima seguridad

---

## 🎉 ¡Listo!

Tu sistema de backups está configurado y listo para proteger tu información.

**Próximos pasos:**
1. Ejecuta un backup de prueba
2. Verifica que llegue a todos los destinos
3. Prueba descargar y restaurar un backup
4. Configura las notificaciones por email

**¿Dudas?** Revisa la documentación de Spatie Backup: https://spatie.be/docs/laravel-backup
