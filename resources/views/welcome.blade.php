<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acortador de URLs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href='/welcome.css'>
</head>
<body>

<div class="container">
    <h1>Acortador de URLs</h1>

    <p>
        Esta aplicación permite generar enlaces cortos a partir de URLs largas.
        Al acceder a un enlace corto, el sistema redirige automáticamente
        a la URL original asociada.
    </p> 

    <p>
        El enlace corto funciona de la siguiente manera:
    </p>

    <ul>
        <li>Se registra una URL original</li>
        <li>Se genera un código corto único</li>
        <li>Se accede al dominio seguido del código</li>
        <li>El navegador redirige a la URL original</li>
    </ul>

    <p class="example">
        Ejemplo:<br>
        https://tudominio.com/abc123 → https://www.ejemplo.com/pagina-larga
    </p>

    <a href="{{ url('/dashboard') }}" class="btn">
        Acceder al panel
    </a>
</div>

</body>
</html>
