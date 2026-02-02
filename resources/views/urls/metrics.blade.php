<x-app-layout>
    <x-slot name="title">Metricas</x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <h1 class="text-2xl font-bold text-gray-900 mb-6">
                Registro de métricas por URL
            </h1>
            
            <div class="bg-white shadow-sm rounded-lg p-6">
                @include('partials.metrics-table')
            </div>

        </div>
    </div>
</x-app-layout>