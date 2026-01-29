
<table>
    <thead>
        <tr>
            <th>URL original</th>
            <th>Código corto</th>
            <th>Total clics</th>
            <th>Detalles</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($urls as $url)
            <tr>
                <td>{{ $url->original_url }}</td>
                <td>{{ $url->shorten_url }}</td>
                <td>{{ $url->metrics_}}</td>
                <td>{{ $url->metrics_count }}</td>
                <td>
                    <a href="{{ route('metrics.show', $url->shorten_url) }}">
                        Ver detalles
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No hay métricas</td>
            </tr>
        @endforelse
    </tbody>
</table>
