<nav style="display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #ddd;">
    
    <div style="display: flex; align-items: center; gap: 20px;">
        <a href="/">
            <img src="https://www.quickshipping.com/_assets/imgs/logos/logo_quick_shipping_logistics.png" alt="logo" style="height: 35px;">
        </a>
        <a href="/view">Mis URLs</a>
    </div>

    <div style="display: flex; align-items: center; gap: 15px;">
        <strong>{{ Auth::user()?->name }}</strong>
        
        <a href="{{ route('profile.edit') }}" style="color: gray; text-decoration: none;">Perfil</a>

        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" style="cursor: pointer; background: #eee; border: 1px solid #ccc; padding: 2px 8px;">
                Cerrar Sesión
            </button>
        </form>
    </div>
</nav>