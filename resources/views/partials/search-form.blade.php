<form id="searchForm" method="GET" class="flex gap-3">
    <input type="text" 
           id="searchId" 
           placeholder="Buscar URL por código corto" 
           required 
           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
        Buscar
    </button>
</form>
<script>
        const form = document.getElementById('searchForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const id = document.getElementById('searchId').value;
            window.location.href = `/show/${id}`;
        });
</script>
