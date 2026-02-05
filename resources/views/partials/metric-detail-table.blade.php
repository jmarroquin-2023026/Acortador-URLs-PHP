<h2 class="text-lg font-semibold mb-4">Historial de Accesos</h2>

<div id="metrics-container">
    @if ($metrics->isEmpty())
        <p id="no-metrics-message" class="text-center text-gray-500 py-12">No hay métricas registradas.</p>
    @endif

    <div class="overflow-x-auto {{ $metrics->isEmpty() ? 'hidden' : '' }}" id="table-wrapper">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                        IP
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                        Navegador
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                        Fecha
                    </th>
                </tr>
            </thead>
            <tbody id="metrics-detail-tbody" class="bg-white">
                @foreach ($metrics as $metric)
                    <tr class="hover:bg-gray-50 border-b border-gray-200">
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $metric->ip_address }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 break-all">
                            {{ $metric->user_agent }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $metric->created_at->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">
    {{ $metrics->links() }}
</div>