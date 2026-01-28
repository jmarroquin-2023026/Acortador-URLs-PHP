<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Acortador de URLs')</title>
    <link rel="stylesheet" href="/dashboard.css">
    <link rel="icon" type="image/png"
          href="https://www.quickshipping.com/_assets/imgs/logos/logo_quick_shipping_guaranty_check.png">
</head>
<body>

    @include('partials.navbar')
    
    @yield('content')

</body>
</html>
