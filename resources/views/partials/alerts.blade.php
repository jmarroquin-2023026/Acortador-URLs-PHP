@if(session('success'))
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 3000)" 
         x-show="show"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
        <span class="text-green-800">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 3000)" 
         x-show="show"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
        <span class="text-red-800">{{ session('error') }}</span>
    </div>
@endif

@isset($searched_url)
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 5000)" 
         x-show="show"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="mb-6 p-6 bg-green-50 border border-green-300 rounded-lg shadow-sm">
        <h3 class="text-lg font-semibold text-green-900 mb-3">Url encontrada para el código: {{ $searched_url->shorten_url }}</h3>
        <div class="space-y-2 text-green-800">
            <p><span class="font-medium">URL Original:</span> {{ $searched_url->original_url }}</p>
            <p><span class="font-medium">Nueva Url:</span> {{ url($searched_url->shorten_url) }}</p>
        </div>
    </div>
@endisset

@if($errors->any())
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 3000)" 
         x-show="show"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
        <ul class="list-disc list-inside text-red-800">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif