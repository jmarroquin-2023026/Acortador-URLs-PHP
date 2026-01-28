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