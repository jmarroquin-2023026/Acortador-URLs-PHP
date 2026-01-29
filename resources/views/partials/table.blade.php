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
                            @include('partials.update-form')
                        </td>
                        <td>
                            <form action="{{ url('delete/' . $url->id) }}" method="POST" style="display:inline" class="actions">
                                <a href="{{ url( $url->shorten_url) }}" target="_blank" class="link">
                                    {{ url($url->shorten_url) }}
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
    </div>