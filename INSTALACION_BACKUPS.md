# 🚀 Instalación Rápida - Sistema de Backups

## Pasos de Instalación

### 1️⃣ Instalar Dependencias

```bash
composer install
```

### 2️⃣ Crear Directorios

```bash
mkdir storage\app\backups
mkdir storage\app\backup-temp
```

### 3️⃣ Ejecutar Seeder de Permisos

```bash
php artisan db:seed --class=PermissionSeeder
```

### 4️⃣ Configurar Variables de Entorno

Agrega al archivo `.env`:

```env
# IMPORTANTE: Ruta de mysqldump para Windows/XAMPP
DB_DUMP_PATH=C:\xampp\mysql\bin

# Email para notificaciones
BACKUP_MAIL_TO=admin@municipalidad.gob.ar

# Google Drive (OPCIONAL - dejar vacío si no usas)
GOOGLE_DRIVE_CLIENT_ID=
GOOGLE_DRIVE_CLIENT_SECRET=
GOOGLE_DRIVE_REFRESH_TOKEN=
GOOGLE_DRIVE_FOLDER=

# AWS S3 (OPCIONAL - dejar vacío si no usas)
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
```

### 5️⃣ Configurar Tareas Programadas

#### **Windows (XAMPP):**

1. Abrir "Programador de tareas de Windows"
2. Crear tarea básica: "Laravel Scheduler"
3. Desencadenador: Diariamente, repetir cada 1 minuto
4. Acción: Iniciar programa
   - Programa: `C:\xampp\php\php.exe`
   - Argumentos: `C:\xampp\htdocs\Sistema-talwind\artisan schedule:run`
   - Iniciar en: `C:\xampp\htdocs\Sistema-talwind`

#### **Linux (Servidor):**

```bash
crontab -e
```

Agregar:
```cron
* * * * * cd /var/www/html/sistema-municipal && php artisan schedule:run >> /dev/null 2>&1
```

### 6️⃣ Probar el Sistema

```bash
# Ejecutar backup de prueba
php artisan backup:smart --only-db

# Ver lista de backups
php artisan backup:list

# Verificar que se creó el archivo
dir storage\app\backups
```

### 7️⃣ Acceder a la Interfaz Web

Ir a: `http://localhost/admin/backups`

---

## ⚙️ Configuración de Destinos (Opcional)

### Solo quieres backups locales (más simple)

✅ **Ya está listo** - Los backups se guardarán en `storage/app/backups`

### Quieres Google Drive (recomendado)

Ver sección "Google Drive" en `README_BACKUPS.md`

### Quieres AWS S3 o Backblaze B2 (recomendado)

Ver sección "AWS S3" en `README_BACKUPS.md`

---

## 📅 Horarios de Backup Automático

Una vez configurado el cron/programador de tareas:

- **13:00** - Backup de base de datos (rápido)
- **22:00** - Backup completo (DB + archivos)

---

## ✅ Verificación

### Comprobar que todo funciona:

1. ✅ Ejecutar: `php artisan backup:smart`
2. ✅ Ver archivo creado en: `storage/app/backups`
3. ✅ Acceder a: `http://localhost/admin/backups`
4. ✅ Ver el backup listado en la interfaz
5. ✅ Descargar el backup de prueba

---

## 🆘 Solución de Problemas

### Error: "Class 'ZipArchive' not found"

**Solución:**
```bash
# Windows (XAMPP)
# Editar php.ini y descomentar:
extension=zip

# Reiniciar Apache
```

### Error: "Permission denied" en storage/app/backups

**Solución:**
```bash
# Windows
icacls storage\app\backups /grant Everyone:F /T

# Linux
chmod -R 775 storage/app/backups
chown -R www-data:www-data storage/app/backups
```

### No se ejecutan los backups automáticos

**Verificar:**
1. ¿Está configurado el cron/programador de tareas?
2. ¿Funciona `php artisan schedule:list`?
3. ¿Hay errores en `storage/logs/laravel.log`?

---

## 📞 Siguiente Paso

Lee el archivo `README_BACKUPS.md` para configuración avanzada y detalles completos.

---

## 🎯 Configuración Mínima Recomendada

Para empezar rápido (solo backups locales):

1. ✅ Instalar dependencias
2. ✅ Crear directorios
3. ✅ Ejecutar seeder
4. ✅ Configurar email en .env
5. ✅ Configurar cron/programador
6. ✅ Probar backup manual

**Tiempo estimado:** 10-15 minutos

---

## 🎉 ¡Listo para Producción!

Una vez que todo funcione en local, para producción:

1. Configurar al menos 1 destino externo (Google Drive o S3)
2. Verificar que el cron está funcionando
3. Probar restauración de un backup
4. Configurar notificaciones por email

**¡Tu sistema está protegido! 🛡️**
