import { createApp } from 'vue'
// import './style.css'
import './index.css'
import PrimeVue from 'primevue/config';
import "primevue/resources/primevue.min.css";
import Avatar from 'primevue/avatar';
import "primevue/resources/themes/lara-light-indigo/theme.css";
import router from './router'

import 'primeicons/primeicons.css';

import App from './App.vue'

createApp(App).use(PrimeVue).use(Avatar).use(router).mount('#app')
