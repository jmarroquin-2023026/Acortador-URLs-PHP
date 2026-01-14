<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Acortador de URLs</title>
    <link rel="stylesheet" href="/dashboard.css">
</head>

<body>
    @if(session('success'))  
        <div>{{session('success')}}</div>
    @endif

    @if(session('error'))
        <div>{{session('error')}}</div>
    @endif

    <div class="container">
        <h1>Acortador de URLs</h1>
            <form action="{{ url('create') }}" method="POST">
                @csrf
                <input class="input-insert" type="url" name="original_url" placeholder="Ingresa la URL" required>
                <button class="button-action" type="submit">Agregar URL</button>
            </form>

        <h1>Buscar URL por ID</h1>
        <form id="searchForm" method="GET" style="margin-bottom: 20px;">
            <input type="number" id="searchId" placeholder="Ingresa el ID" required class="input-insert">
            <button type="submit" class="button-action">Buscar</button>
        </form>

       

    </div>
     @if(session('found_url'))
            <div class="search-result">
                <strong>URL encontrada:</strong>
                <span><strong>ID:</strong> {{ session('found_url')->id }}</span><br>
                <span><strong>Original:</strong> {{ session('found_url')->original_url }}</span><br>
                <span><strong>Corta:</strong> 
                    <a href="{{ url('api/' . session('found_url')->shorten_url) }}" target="_blank">
                        {{ url('api/' . session('found_url')->shorten_url) }}
                    </a>
                </span>
            </div>
        @endif
        <script>
            const form = document.getElementById('searchForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const id = document.getElementById('searchId').value;
                window.location.href = `/show/${id}`;
            });
        </script>

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
                            <button class="button-action" type="submit"
                                onclick="return confirm('¿Seguro que quieres eliminar esta URL?')">Eliminar</button>
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
    <div class="pagination">
        {{$urls->links()}}
    </div>
</body>

</html>