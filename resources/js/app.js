import './bootstrap';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import Alpine from 'alpinejs';
import './metrics-realtime'; // Ejecuta el registro de initMetricsRealtime
import './metrics-init';
import { verifyCalendar } from './calendar';

window.Alpine = Alpine;

Alpine.start();

window.Pusher=Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: false,
    enabledTransports: ['ws'], 
    
});


window.verifyCalendar=verifyCalendar;