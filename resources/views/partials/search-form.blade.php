
<form id="searchForm" method="GET">
        <input type="text" id="searchId" placeholder="Ingresa el ID" required class="input-insert">
    <button type="submit" class="button-action">Buscar</button>
</form>

<script>
        const form = document.getElementById('searchForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const id = document.getElementById('searchId').value;
            window.location.href = `/show/${id}`;
        });
</script>
