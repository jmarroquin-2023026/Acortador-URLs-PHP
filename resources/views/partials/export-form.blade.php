<form method="POST" action="{{ route('metrics.export', $url->id) }}">
    @csrf

    <div class="flex gap-4 items-end">
        <div>
            <label class="text-sm">Desde</label>
            <input id="fromDate" type="date" name="from" required class="border rounded px-2 py-1" max="{{ date('Y-m-d') }}">
        </div>

        <div>
            <label class="text-sm">Hasta</label>
            <input id="toDate" type="date" name="to" required class="border rounded px-2 py-1" max="{{ date('Y-m-d') }}">
        </div>

        <button class="bg-green-500 text-black px-4 py-1 rounded">
            Exportar Excel
        </button>
    </div>
</form>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof window.verifyCalendar === 'function') {
            window.verifyCalendar();
        }
    });
</script>
@endpush