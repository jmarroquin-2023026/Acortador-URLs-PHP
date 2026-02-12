<div class="overflow-x-auto">
    <table class="w-full table-auto border-collapse">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200 w-20">
                    ID
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                    URL Original
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                    URL Corta
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse($urls as $url)
                <tr class="hover:bg-gray-50 border-b border-gray-200">
                    <td class="px-6 py-4 text-sm text-gray-900">
                        {{ $url->id }}
                    </td>
                    <td class="px-6 py-4">
                        @include('partials.update-form')
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-start gap-3">
                            <a href="{{ url($url->shorten_url) }}" 
                               target="_blank" 
                               class="flex-1 text-blue-600 hover:text-blue-800 hover:underline text-sm break-all">
                                {{ url($url->shorten_url) }}
                            </a>
                            <form action="{{ url('delete/' . $url->id) }}" method="POST" class="flex-shrink-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('¿Seguro que quieres eliminar esta URL?')"
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center text-gray-500 border-b border-gray-200">
                        No hay URLs registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>