# 🔗 Acortador de URLs – Laravel (Docker)

## 📌 Descripción

Aplicación desarrollada en **Laravel** que permite convertir URLs largas en enlaces cortos mediante un código único.

Cuando un usuario accede a una URL corta, el sistema lo redirige automáticamente a la URL original.

El proyecto está completamente **dockerizado**, por lo que no requiere instalación local de PHP ni Laravel, todo se ejecuta dentro de contenedores Docker.

---

## 🚀 Características

- CRUD completo de URLs
- Redirección automática
- Dashboard administrativo
- Paginación
- Validaciones
- Exportación de métricas
- **Laravel Reverb** para actualización en tiempo real (WebSocket)
- Base de datos MySQL en contenedor Docker

---

## 🛠 Tecnologías utilizadas

- PHP 8.4
- Laravel 12
- MySQL 8.0
- Docker
- Docker Compose
- **Laravel Reverb** (WebSockets en tiempo real)
- Node.js 25
- npm / Vite (compilación de assets)
- Blade
- JavaScript
- Laravel Excel

---

## ⚙️ Requisitos previos

### Para Windows

- **Windows 10/11** (64-bit)
- **[Docker Desktop para Windows](https://www.docker.com/products/docker-desktop/)** (incluye Docker y Docker Compose)
- **WSL2** habilitado (Docker Desktop lo solicita durante la instalación)
- **Git** ([descargar aquí](https://git-scm.com/download/win))
- **Node.js 25** ([descargar aquí](https://nodejs.org/)) - Necesario para compilar los assets del frontend

### Para macOS

- **macOS 11+**
- **[Docker Desktop para macOS](https://www.docker.com/products/docker-desktop/)** (incluye Docker y Docker Compose)
- **Git** (generalmente ya viene instalado, verificar con `git --version`)
- **Node.js 25** ([descargar aquí](https://nodejs.org/)) - Necesario para compilar los assets del frontend

### Para Linux

- **Docker** ([instrucciones de instalación](https://docs.docker.com/engine/install/))
- **Docker Compose** ([instrucciones de instalación](https://docs.docker.com/compose/install/))
- **Git**
- **Node.js 25** ([instrucciones de instalación](https://nodejs.org/en/download/package-manager))

---

## ✅ Verificar instalación de requisitos

Antes de comenzar, verifica que tengas instalado lo necesario:

```bash
# Verificar Docker
docker --version

# Verificar Docker Compose
docker compose version

# Verificar Git
git --version

# Verificar Node.js
node --version

# Verificar npm
npm --version
```

Si todos los comandos retornan una versión, estás listo para continuar.

---

## 📦 Instalación paso a paso

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/jmarroquin-2023026/Acortador-URLs-PHP.git
cd Acortador-URLs-PHP
```

### 2️⃣ Crear archivo de entorno

**macOS / Linux:**

```bash
cp .env.example .env
```

**Windows (PowerShell):**

```powershell
copy .env.example .env
```

**Windows (CMD):**

```cmd
copy .env.example .env
```

### 3️⃣ Configurar variables de entorno

Abre el archivo `.env` y realiza los siguientes cambios:

#### ✏️ Cambios necesarios:

```env
# 1. Cambiar el nombre de la aplicación
APP_NAME=Acortador_Urls

# Base de datos (debe coincidir con docker-compose.yml)
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=Urls_Shorten
DB_USERNAME=root
DB_PASSWORD=root

# Configuración del proyecto
SESSION_DRIVER=file
BROADCAST_CONNECTION=reverb
QUEUE_CONNECTION=sync
CACHE_STORE=file

```

#### ➕ Agregar al final del archivo:

```env
# Configuración de Reverb (valores de ejemplo para desarrollo)
REVERB_APP_ID=123456
REVERB_APP_KEY=u6mw8yhv4fkvq1rryduf
REVERB_APP_SECRET=biuwvedtxfxerpvacrxh
REVERB_HOST=reverb
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="localhost"
VITE_REVERB_PORT="8080"
VITE_REVERB_SCHEME="http"
```

⚠️ **Notas importantes:**
- `APP_KEY` se generará automáticamente en el paso 6
- `DB_HOST=db` es el nombre del servicio de MySQL en Docker
- `REVERB_HOST=reverb` es el nombre del servicio de Reverb en Docker (para comunicación interna)
- `VITE_REVERB_HOST="localhost"` es para que el navegador se conecte al WebSocket

### 4️⃣ Construir y levantar contenedores

```bash
docker compose up -d --build
```

**Nota:** La primera vez puede tardar varios minutos mientras descarga las imágenes de Docker.

### 5️⃣ Instalar dependencias de Laravel

```bash
docker compose exec app composer install
```

### 6️⃣ Generar clave de la aplicación

```bash
docker compose exec app php artisan key:generate
```

### 7️⃣ Ejecutar migraciones

```bash
docker compose exec app php artisan migrate
```

### 8️⃣ (Opcional) Ejecutar seeders

```bash
docker compose exec app php artisan db:seed
```

### 9️⃣ Instalar dependencias de Node.js

```bash
npm install
```

### 🔟 Compilar assets del frontend

```bash
npm run build
```

⚠️ **Importante:** Este paso es crucial para que las vistas y el WebSocket funcionen correctamente.

### 1️⃣1️⃣ Verificar que todos los contenedores estén corriendo

```bash
docker compose ps
```

Deberías ver 4 contenedores activos:
- `laravel_app`
- `laravel_nginx` 
- `laravel_reverb` 
- `laravel_db` 

---

## 🌐 Acceso a la aplicación

Abre tu navegador en:

```
http://localhost:8000
```

---

## 🔧 Comandos útiles

### Detener contenedores

```bash
docker compose down
```

### Iniciar contenedores

```bash
docker compose up -d
```

### Ver logs en tiempo real

```bash
docker compose logs -f
```

### Ver logs de Reverb (WebSocket)

```bash
docker compose logs -f reverb
```

### Reiniciar contenedores

```bash
docker compose restart
```

### Limpiar caché de Laravel

```bash
docker compose exec app php artisan cache:clear
docker compose exec app php artisan config:clear
docker compose exec app php artisan route:clear
docker compose exec app php artisan view:clear
```

### Recompilar assets

```bash
npm run build
```


### Reconstruir desde cero

```bash
docker compose down -v
docker compose up -d --build
docker compose exec app composer install
npm install
npm run build
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

---

## 🗄️ Base de datos

### Conexión desde Laravel (dentro de Docker)

- **Host:** `db`
- **Puerto:** `3306`
- **Database:** `Urls_Shorten`
- **Username:** `root`
- **Password:** `root`

### Conexión desde herramientas externas (DBeaver, TablePlus, etc.)

- **Host:** `127.0.0.1` o `localhost`
- **Puerto:** `3307` ⚠️ (según configuración en `docker-compose.yml`, sección `db` → `ports`)
- **Database:** `Urls_Shorten`
- **Username:** `root`
- **Password:** `root`

---

## 🧪 Solución de problemas comunes

### ❌ Error: `php_network_getaddresses: getaddrinfo for db failed`

**Solución:**

```bash
docker compose ps  # Verificar que todos los contenedores estén corriendo
docker compose restart
```

### ❌ Error: Las vistas no cargan o aparecen sin estilos

**Solución:**

```bash
npm run build
```

Luego recarga la página con Ctrl+Shift+R (Windows/Linux) o Cmd+Shift+R (macOS).

### ❌ Error: WebSocket no se conecta

**Solución:**

1. Verificar que Reverb esté corriendo:
```bash
docker compose logs reverb
```

2. Recompilar assets:
```bash
npm run build
```

3. Reiniciar contenedores:
```bash
docker compose restart
```

### ❌ Error: `composer: command not found`

Recuerda ejecutar Composer dentro del contenedor:

```bash
docker compose exec app composer [comando]
```

### ❌ Error: Puerto 8000 ya está en uso

Cambia el puerto en `docker-compose.yml` en la sección de nginx:

```yaml
ports:
  - "9000:80"  # Cambiar 8000 por otro puerto disponible
```

---

## 📋 Resumen de cambios en `.env`

### Variables que debes CAMBIAR:

| Variable | Valor original | Valor nuevo |
|----------|---------------|-------------|
| `APP_NAME` | `Laravel` | `Acortador_Urls` |
| `DB_CONNECTION` | `sqlite` | `mysql` |
| `SESSION_DRIVER` | `database` | `file` |
| `BROADCAST_CONNECTION` | `log` | `reverb` |
| `QUEUE_CONNECTION` | `database` | `sync` |
| `CACHE_STORE` | `database` | `file` |




---

## 🔒 Consideraciones de seguridad

- El archivo `.env` **NO** se sube al repositorio (está en `.gitignore`)
- Nunca subas credenciales reales al repositorio público
- Cambia las credenciales en entornos de producción
- Las credenciales de Reverb deben ser únicas en producción

---

## 📌 Arquitectura del proyecto

```
┌─────────────────────────────────────────┐
│         Navegador (localhost:8000)      │
│  - Aplicación web                       │
│  - WebSocket (localhost:8080)           │
└──────────────┬──────────────────────────┘
               │
┌──────────────▼──────────────────────────┐
│           Docker Containers             │
│                                         │
│  ┌─────────────┐  ┌─────────────┐       │
│  │   Nginx     │  │   Reverb    │       │
│  │   :8000     │  │   :8080     │       │
│  └──────┬──────┘  └──────┬──────┘       │
│         │                │              │
│  ┌──────▼────────────────▼──────┐       │
│  │      Laravel App             │       │
│  │      (PHP-FPM)               │       │
│  └──────────────┬───────────────┘       │
│                 │                       │
│  ┌──────────────▼────────────────┐      │
│  │      MySQL Database           │      │
│  │      :3307 (external)         │      │
│  └───────────────────────────────┘      │
└─────────────────────────────────────────┘
```

---
