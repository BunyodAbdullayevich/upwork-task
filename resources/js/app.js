require('./bootstrap');

import { createApp } from "vue";
import router from './router'
import App from './App.vue';

// Import User Class
import User from './Helpers/User'
window.User = User

// Import Notification Class
import Notification from './Helpers/Notification'
window.Notification = Notification

const app = createApp({});
app.use(router);
app.component('app', App);
app.mount('#app');


