@if(session('success'))
    <div class="success-message">
        <span class="text-info">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="error-message">
        <span class="text-info">{{ session('error') }}</span>
    </div>
@endif

@isset($searched_url)
    <div class="card shadow-lg p-4 mb-4 bg-white rounded">
        <h3>Resultado de la búsqueda:</h3>
        <p>URL Original: {{ $searched_url->original_url }}</p>
        <p>Código: {{ $searched_url->shorten_url }}</p>
    </div>
@endisset
@if($errors->any())
    <div class="error-message">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif