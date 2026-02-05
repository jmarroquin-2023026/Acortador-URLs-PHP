<div class="overflow-x-auto">
    <table class="w-full table-auto border-collapse">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                    URL original
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                    Código corto
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                    Total clics
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                    Detalles
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($urls as $url)
                <tr class="hover:bg-gray-50 border-b border-gray-200">
                    <td class="px-6 py-4 text-sm text-gray-900 break-all">
                        {{ $url->original_url }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        {{ $url->shorten_url }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                       <span id="total-clicks-{{ $url->id }}">
                            {{ $url->metrics_count }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('metrics.show', $url->shorten_url) }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm font-medium">
                            Ver detalles
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500 border-b border-gray-200">
                        No hay métricas
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @push('scripts')
        <script>
            (function() {
                const urlIds = @json($urls->pluck('id'));
                function starter() {
                    if (typeof window.initAllUrlsRealtime === 'function') {
                        window.initAllUrlsRealtime(urlIds);
                    } else {
                        setTimeout(starter, 50);
                    }
                }
                starter();
            })();
        </script>
        @endpush
    <div class="mt-6">
        {{ $urls->links() }}
    </div>
</div>