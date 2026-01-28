<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acortador de URLs') }}
        </h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('partials.alerts')

            <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
                <h1 class="text-lg font-semibold mb-4">Crear URL corta</h1>
                @include('partials.create-form')
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
                <h1 class="text-lg font-semibold mb-4">Buscar URL por código corto</h1>
                @include('partials.search-form')
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                @include('partials.table')

                <div class="mt-4">
                    {{ $urls->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
