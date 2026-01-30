<nav class="w-full border-b border-gray-200 bg-white mb-16">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-8">
            <a href="/" class="flex items-center">
                <img
                    src="https://www.quickshipping.com/_assets/imgs/logos/logo_quick_shipping_logistics.png"
                    alt="Quick Shipping"
                    class="h-9"
                >
            </a>

            @auth
                <a href="/view"
                   class="text-sm font-medium text-gray-700 hover:text-blue-600 transition">
                    Mis URLs
                </a>

                <a href="{{ route('metrics.index') }}"
                   class="text-sm font-medium text-gray-700 hover:text-blue-600 transition">
                    Métricas
                </a>
            @endauth
        </div>
        <div class="flex items-center gap-4 text-sm">

            @auth
                <span class="font-semibold text-gray-800">
                    {{ Auth::user()->name }}
                </span>

                <a href="{{ route('profile.edit') }}"
                   class="text-gray-600 hover:text-blue-600 transition">
                    Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="px-3 py-1.5 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        Cerrar sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="font-medium text-gray-700 hover:text-blue-600 transition">
                    Iniciar sesión
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 rounded-lg border border-gray-300 font-semibold text-gray-700 hover:bg-gray-100 transition">
                        Regístrate
                    </a>
                @endif
            @endauth
        </div>
    </div>
</nav>