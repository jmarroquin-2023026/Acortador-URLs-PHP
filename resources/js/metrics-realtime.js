export const initMetricsRealtime = (urlId) => {
    if (!window.Echo) return;

    window.activeMetricsChannels = window.activeMetricsChannels || {};
    if (window.activeMetricsChannels[urlId]) return;

    const channel = window.Echo.channel(`url-metrics.${urlId}`);
    window.activeMetricsChannels[urlId] = channel;

    channel.listen('.UrlClicked', (e) => {
        const detailEl = document.getElementById('total-clicks');
        if (detailEl) detailEl.textContent = e.total_clicks;

        const rowEl = document.getElementById(`total-clicks-${urlId}`);
        if (rowEl) {
            rowEl.textContent = e.total_clicks;
            rowEl.classList.add('text-green-600', 'font-bold', 'transition-all', 'scale-110');
            setTimeout(() => rowEl.classList.remove('text-green-600', 'scale-110'), 1000);
        }

        const tbody = document.getElementById('metrics-detail-tbody');
        const noMetricsMessage = document.getElementById('no-metrics-message');
        const tableWrapper = document.getElementById('table-wrapper');

        if (tbody) {
            if (noMetricsMessage) noMetricsMessage.remove();
            if (tableWrapper) tableWrapper.classList.remove('hidden');

            const newRow = document.createElement('tr');
            newRow.className = 'hover:bg-gray-50 border-b border-gray-200 bg-green-50 transition-colors duration-1000';
            
            const date = new Date(e.metric.created_at);
            const formattedDate = date.toLocaleDateString('es-ES') + ' ' + 
                                date.toLocaleTimeString('es-ES', {hour: '2-digit', minute:'2-digit'});

            newRow.innerHTML = `
                <td class="px-6 py-4 text-sm text-gray-900">${e.metric.ip_address}</td>
                <td class="px-6 py-4 text-sm text-gray-900 break-all">${e.metric.user_agent}</td>
                <td class="px-6 py-4 text-sm text-gray-900">${formattedDate}</td>
            `;

            tbody.insertBefore(newRow, tbody.firstChild);
            setTimeout(() => newRow.classList.remove('bg-green-50'), 2000);
        }
    });
};

window.initMetricsRealtime = initMetricsRealtime;

window.initMetricsWhenReady = (urlId) => {
    const tryInit = () => {
        if (typeof window.initMetricsRealtime === 'function') {
            window.initMetricsRealtime(urlId);
        } else {
            setTimeout(tryInit, 50);
        }
    };
    tryInit();
};

window.initAllUrlsRealtime = (urlIds) => {
    if (Array.isArray(urlIds)) {
        urlIds.forEach(id => window.initMetricsWhenReady(id));
    }
};