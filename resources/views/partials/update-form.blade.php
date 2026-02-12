<form action="{{ url('update/' . $url->id) }}" method="POST" class="flex gap-2 items-center">
    @csrf
    @method('PUT')
    <input type="url"
    name="original_url"
    value="{{ $url->original_url }}"
    readonly
    ondblclick="this.removeAttribute('readonly')"
    onblur="this.setAttribute('readonly', true)"
    title="Doble click para editar"
    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
    required>
    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg transition-colors text-sm font-medium whitespace-nowrap" 
    type="submit">Actualizar</button>
</form>