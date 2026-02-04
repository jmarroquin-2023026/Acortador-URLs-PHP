// resources/js/metrics-init.js

export const initMetricsWhenReady = (urlId) => {
    const tryInit = () => {
        // Buscamos la función que definimos en el otro archivo
        if (typeof window.initMetricsRealtime === 'function') {
            window.initMetricsRealtime(urlId);
        } else {
            setTimeout(tryInit, 50); // Reintento rápido
        }
    };
    tryInit();
};

export const initAllUrlsRealtime = (urlIds) => {
    urlIds.forEach(id => initMetricsWhenReady(id));
};

// Registro global
window.initMetricsWhenReady = initMetricsWhenReady;
window.initAllUrlsRealtime = initAllUrlsRealtime;