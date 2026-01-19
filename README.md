# Acortador de URLs – Laravel

## Descripción

Esta aplicación es un **acortador de URLs** desarrollado con **Laravel**, permite convertir URLs largas en enlaces cortos mediante un código único.  
Cuando un usuario accede a una URL corta, el sistema lo redirige automáticamente a la URL original.

Incluye:
- Panel de administración (dashboard)
- CRUD completo de URLs
- Redirección automática
- Paginación
- Validación de datos

---

## Tecnologías utilizadas

- PHP 8+
- Laravel 10+
- Blade (vistas)
- MySQL 
- HTML / CSS
- JavaScript (básico)

---

## Estructura general

- **Controller:** `URLsController`
- **Modelo:** `Urls`
- **Vistas:**  
  - `welcome.blade.php`
  - `dashboard.blade.php`
- **Rutas:** `web.php`

---

## Funcionamiento general

1. El usuario ingresa una URL larga.
2. El sistema genera un código corto aleatorio.
3. Se almacena la URL original junto con el código.
4. Al acceder a `/api/{codigo}`, se redirige a la URL original.

---

## Funcionamiento del resto de métodos

- **Actualizar:**
    - Haz doble click sobre el texto para poder editarlo, al terminar presiona el botón actualizar.

- **Eliminar:**
    - Al lado de la nueva url encontrarás un botón para eliminar, lanzará una alerta en la cual tendrás que confirmar eliminar el registro.

- **Buscar:**
    - Encontraras un apartado para buscar por codigo corto, una vez busques el codigo inmediatamente serás redireccionado a la url original.

---

## Consideraciones técnicas

El proyecto requiere configurar las variables de entorno en el archivo .env este es creado por el usuario luego de clonar el repositorio.

Variables de entorno necesarias:

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=Urls_Shorten
DB_USERNAME=
DB_PASSWORD=

> Nota:  
> Los valores pueden variar según la configuración local del desarrollador.
> Asegúrate de usar las credenciales correctas de tu entorno.


### Base de datos

La base de datos se crea automáticamente al ejecutar las migraciones del proyecto.
Esto se hace con el siguiente comando:

>php artisan migrate

No es necesario crear manualmente la base de datos, siempre que:
- El servidor de base de datos esté activo
- El usuario tenga permisos para crear bases de datos


### Instalación y ejecución

1. Clonar el repositorio
    >git clone https://github.com/jmarroquin-2023026/Acortador-URLs-PHP.git
2. Instalar dependencias:
   >composer install
3. Crear el archivo de entorno a partir de la plantilla:
   >cp .env.example .env
4. Generar la clave de la aplicación:
   >php artisan key:generate
5. Ejecutar migraciones:
   >php artisan migrate
6. Iniciar el servidor:
   >php artisan serve

>Nota:
>El archivo .env se genera a partir de .env.example para garantizar que todas las variables
>necesarias estén definidas antes de ejecutar la aplicación.

## Decisiones técnicas

- Se utilizó MySQL por su compatibilidad y facilidad de uso en entornos locales.
- La creación de tablas se maneja mediante migraciones para facilitar el despliegue.
- El archivo `.env` no se incluye en el repositorio por razones de seguridad.

