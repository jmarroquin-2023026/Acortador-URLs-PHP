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


    <h1>Acortador de URLs</h1>

    <form action="{{ url('create') }}" method="POST">
        @csrf
        <input type="url" name="original_url" placeholder="Ingresa la URL" required>
        <button type="submit">Agregar URL</button>
    </form>

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
</body>

</html>