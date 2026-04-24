// resources/js/app.js

import axios from 'axios';
import Alpine from 'alpinejs';
import './echo'; // Pastikan file echo.js ada di folder yang sama

// 1. Konfigurasi Axios
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// 2. Konfigurasi Alpine.js untuk fitur dropdown & interaktivitas UI
window.Alpine = Alpine;
Alpine.start();