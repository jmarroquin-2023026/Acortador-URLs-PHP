<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Acortador de URLs</title>
    <link rel="stylesheet" href="/dashboard.css">
    <link rel="icon" type="image/png" href="https://www.quickshipping.com/_assets/imgs/logos/logo_quick_shipping_guaranty_check.png">
</head>

<body>
    <nav class="navbar">
        <div class="nav-toggle" onclick="document.querySelector('.nav-list').classList.toggle('active')">
            <span></span>
        </div>
        <ul class="nav-list">
            <li>
                <a href="/">
                    <img class="logo" 
                    src='https://www.quickshipping.com/_assets/imgs/logos/logo_quick_shipping_logistics.png' alt="quickshipping-logo">
                </a>
            </li>
        </ul>
    </nav>
    @if(session('success'))  
        <div class="success-message">
            <span class="text-info">{{session('success')}}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="error-message">
            <span class="text-info">{{session('error')}}</span>
        </div>
    @endif

    <div class="container">
        <h1>Acortador de URLs</h1>
            <form action="{{ url('create') }}" method="POST">
                @csrf
                <input class="input-insert" type="url" name="original_url" placeholder="Ingresa la URL" required>
                <button class="button-action" type="submit">Agregar URL</button>
            </form>

        <h1>Buscar URL por codigo corto</h2>
        <form id="searchForm" method="GET" >
            <input type="text" id="searchId" placeholder="Ingresa el ID" required class="input-insert">
            <button type="submit" class="button-action">Buscar</button>
        </form>

       

    </div>
        <script>
            const form = document.getElementById('searchForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const id = document.getElementById('searchId').value;
                window.location.href = `/show/${id}`;
            });
        </script>
    <div class="table-wrapped">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>URL Original</th>
                    <th>URL Corta</th>
                </tr>
            </thead>
            <tbody>
                @forelse($urls as $url)
                    <tr>
                        <td>{{ $url->id }}</td>
                        <td>
                            <form action="{{ url('update/' . $url->id) }}" method="POST" style="display:flex; gap:5px; align-items:center;">
                                @csrf
                                @method('PUT')
                                <input type="url"
                                    name="original_url"
                                    value="{{ $url->original_url }}"
                                    readonly
                                    ondblclick="this.removeAttribute('readonly')"
                                    onblur="this.setAttribute('readonly', true)"
                                    title="Doble click para editar"
                                    class='input-text'
                                    required>
                                <button class="button-action" type="submit">Actualizar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ url('delete/' . $url->id) }}" method="POST" style="display:inline" class="actions">
                                <a href="{{ url('api/' . $url->shorten_url) }}" target="_blank" class="link">
                                {{ url('api/' . $url->shorten_url) }}
                            </a>
                                @csrf
                                @method('DELETE')
                                <button class="button-action" type="submit" onclick="return confirm('¿Seguro que quieres eliminar esta URL?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay URLs registradas.</td>
                    </tr>
                    
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{$urls->links()}}
    </div>
</body>

</html>