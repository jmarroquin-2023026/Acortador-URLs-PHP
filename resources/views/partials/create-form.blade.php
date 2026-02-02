<form action="{{ url('create') }}" method="POST" class="flex gap-3">
    @csrf
    <input type="url" 
           name="original_url" 
           placeholder="Ingresa la URL" 
           required 
           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
        Agregar URL
    </button>
</form>