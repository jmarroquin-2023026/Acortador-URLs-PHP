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
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-800">
                            {{ Auth::user()->name }}
                        </span>
                        <svg class="w-4 h-4 text-gray-600 transition-transform" 
                             :class="{ 'rotate-180': open }"
                             fill="none" 
                             stroke="currentColor" 
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50"
                         style="display: none;">
                        
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            Perfil
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
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