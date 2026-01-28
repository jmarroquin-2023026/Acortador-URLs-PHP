<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Acortador de URLs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/welcome.css">
</head>
<body>

    <div class="container">

        <h1>Acortador de URLs</h1>

        <p class="subtitle">
            Genera enlaces cortos, simples y fáciles de compartir.
        </p>

        <p>
            Esta aplicación permite transformar URLs largas en enlaces cortos.
            Al acceder a un enlace corto, el sistema redirige automáticamente
            a la URL original asociada.
        </p>

        <ul class="features">
            <li>Registro de URLs originales</li>
            <li>Generación automática de códigos únicos</li>
            <li>Redirección inmediata</li>
            <li>Gestión desde un panel privado</li>
        </ul>

        <p class="example">
            Ejemplo:<br>
            <strong>https://tudominio.com/abc123</strong> →
            <strong>https://www.ejemplo.com/pagina-muy-larga</strong>
        </p>

        {{-- ACCIONES --}}
        <div class="actions">

            @auth
                <a href="{{ route('dashboard') }}" class="btn primary">
                    Ir al Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn primary">
                    Iniciar sesión
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn secondary">
                        Registrarse
                    </a>
                @endif
            @endauth

        </div>

    </div>

</body>
</html>
