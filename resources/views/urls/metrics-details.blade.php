<x-app-layout>
        <h1>
            Métricas de la URL
        </h1>

    <div>
        <div>
            <p><strong>URL original:</strong> {{ $url->original_url }}</p>
            <p><strong>Código corto:</strong> {{ $url->shorten_url }}</p>
            <p><strong>Total de clics:</strong> {{ $url->metrics->count() }}</p>
        </div>

        @include('partials.metric-detail-table')
    </div>
</x-app-layout>
