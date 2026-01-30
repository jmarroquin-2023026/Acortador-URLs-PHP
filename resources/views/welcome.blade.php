<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Quick Link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://www.quickshipping.com/_assets/imgs/logos/logo_quick_shipping_guaranty_check.png">
    @vite(['resources/css/app.css', 'resources/js/scroll.js'])
</head>
<body class="bg-white text-gray-800">
    @include('partials.navbar')
    
    <section class="max-w-7xl mx-auto px-6 py-12 md:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                    Simplifica tus enlaces<br>
                    Rastrea tus resultados
                </h1>

                <p class="text-lg text-gray-600 leading-relaxed">
                    Transforma enlaces largos y complejos en URLs breves, fáciles de compartir y totalmente rastreables.
                    Nuestra plataforma te ofrece estadísticas detalladas de cada interacción desde el primer segundo:
                    rastrea la ubicación geográfica, los dispositivos utilizados y las fuentes de tráfico de tus usuarios.
                    Todo lo que necesitas para gestionar tus campañas digitales de forma profesional y eficiente en un solo lugar.
                </p>
            </div>

            <div class="flex justify-center md:justify-end">
                <img
                    src="https://res.cloudinary.com/dksbgkdhe/image/upload/v1769796018/QUICKLINK_logo.svg"
                    alt="Quick Link"
                    class="w-full max-w-sm md:max-w-md h-auto">
            </div>
        </div>

        <div class="flex justify-center mt-12">
            <a href="#como-funciona" 
               class="text-blue-500 hover:text-blue-600 transition-colors duration-300 animate-bounce">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </a>
        </div>
    </section>

    <section id="como-funciona" class="py-16 md:py-20 bg-gray-50 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12 md:mb-16">
                ¿Cómo funciona?
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg">
                        1
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Acorta</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Pega tu enlace largo y genera uno corto en un clic.
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg">
                        2
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Comparte</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Envía tu enlace por redes sociales, email o SMS.
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg">
                        3
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Analiza</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Mira quién hace clic, desde dónde y qué dispositivo usa.
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>