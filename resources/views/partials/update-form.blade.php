<form action="{{ url('update/' . $url->id) }}" method="POST" style="display:flex; gap:5px; align-items:center;">
    @csrf
    @method('PUT')
    <input type="url"
    name="original_url"
    value="{{ $url->original_url }}"
    readonly
    ondblclick="this.removeAttribute('readonly')"
    onblur="this.setAttribute('readonly', true)"
    title="Doble click para editar"
    class="input-text" required>

    <button class="button-action" type="submit">Actualizar</button>
</form>