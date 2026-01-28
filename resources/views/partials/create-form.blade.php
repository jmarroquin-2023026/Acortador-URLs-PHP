<form action="{{ url('create') }}" method="POST">
    @csrf
    <input class="input-insert" type="url" name="original_url" placeholder="Ingresa la URL" required>
    <button class="button-action" type="submit">Agregar URL</button>
</form>