<x-app-layout>
    <x-slot name="title">Detalle URL</x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="font-semibold text-xl text-gray-800 ">
                    Métricas de la URL
                </h1>    
            <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
                <div class="space-y-2">
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">URL Original:</span> {{ $url->original_url }}
                    </p>
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Código Corto:</span> {{ $url->shorten_url }}
                    </p>
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Total de Clics:</span> 
                        <span id="total-clicks">{{$metrics->total()}}</span>
                    </p>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                @include('partials.metric-detail-table')
            </div>
            
        </div>
    </div>
   @push('scripts')
<script>
    (function() {
        const urlId = @json($url->id);
        
        function checkAndInit() {
            if (typeof window.initMetricsWhenReady === 'function') {
                window.initMetricsWhenReady(urlId);
            } else {
                setTimeout(checkAndInit, 50);
            }
        }
        checkAndInit();
    })();
</script>
@endpush

</x-app-layout>