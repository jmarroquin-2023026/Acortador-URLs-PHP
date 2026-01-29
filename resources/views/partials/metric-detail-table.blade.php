<div>
    <h2 >Detalle de accesos</h2>

    @if ($url->metrics->isEmpty())
        <p>No hay métricas registradas.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>IP</th>
                    <th>Navegador</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($url->metrics as $metric)
                    <tr>
                        <td>{{ $metric->ip_address }}</td>
                        <td>{{ $metric->user_agent }}</td>
                        <td>
                            {{ $metric->created_at->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
